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
 * @property int $curso_id
 *
 * @property AlunoDisciplina[] $alunoDisciplinas
 * @property Aluno[] $alunoIdPerfils
 * @property Professor $professor
 * @property Curso $curso
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
            [['nome', 'abreviatura', 'semestre', 'id_professor', 'curso_id'], 'required'],
            [['semestre', 'id_professor', 'curso_id'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['abreviatura'], 'string', 'max' => 45],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id_perfil']],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_id' => 'id']],
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
            'id_professor' => 'Professor',
            'curso_id' => 'Curso',
            'professor.perfil.nome' => 'Professor',
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
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'curso_id']);
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
