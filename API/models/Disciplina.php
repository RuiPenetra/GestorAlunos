<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property int $id
 * @property string $nome
 * @property string $abreviatura
 * @property int $semestre
 * @property int $id_professor
 *
 * @property AlunoDisciplina[] $alunoDisciplinas
 * @property Aluno[] $alunoIdPerfils
 * @property Professor $professor
 * @property LinhaDiscCur[] $linhaDiscCurs
 * @property Curso[] $cursos
 * @property Teste[] $testes
 * @property Turno[] $turnos
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'abreviatura', 'semestre', 'id_professor'], 'required'],
            [['semestre', 'id_professor'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['abreviatura'], 'string', 'max' => 45],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id_perfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'abreviatura' => 'Abreviatura',
            'semestre' => 'Semestre',
            'id_professor' => 'Nome do Professor',
            'professor.perfil.nome' => 'Nome do Professor'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoDisciplinas()
    {
        return $this->hasMany(AlunoDisciplina::className(), ['disciplina_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoIdPerfils()
    {
        return $this->hasMany(Aluno::className(), ['id_perfil' => 'aluno_id_perfil'])->viaTable('aluno_disciplina', ['disciplina_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_perfil' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaDiscCurs()
    {
        return $this->hasMany(LinhaDiscCur::className(), ['id_disc' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['id' => 'id_curso'])->viaTable('linha_disc_cur', ['id_disc' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestes()
    {
        return $this->hasMany(Teste::className(), ['id_disciplina' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turno::className(), ['id_disciplina' => 'id']);
    }
}
