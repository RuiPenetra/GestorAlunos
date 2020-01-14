<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property int $id_perfil
 * @property int $id_curso
 *
 * @property Perfil $perfil
 * @property Curso $curso
 * @property AlunoDisciplina[] $alunoDisciplinas
 * @property Disciplina[] $disciplinas
 * @property AlunoTeste[] $alunoTestes
 * @property Teste[] $testes
 * @property AlunoTurno[] $alunoTurnos
 * @property Turno[] $turnos
 * @property Pagamento[] $pagamentos
 * @property Presenca[] $presencas
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perfil', 'id_curso'], 'required'],
            [['id_perfil', 'id_curso'], 'integer'],
            [['id_perfil'], 'unique'],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_user']],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_perfil' => 'Nome',
            'id_curso' => 'Curso',
            'curso.nome' => 'Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id_user' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoDisciplinas()
    {
        return $this->hasMany(AlunoDisciplina::className(), ['aluno_id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['id' => 'disciplina_id'])->viaTable('aluno_disciplina', ['aluno_id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoTestes()
    {
        return $this->hasMany(AlunoTeste::className(), ['aluno_id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestes()
    {
        return $this->hasMany(Teste::className(), ['id' => 'teste_id'])->viaTable('aluno_teste', ['aluno_id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoTurnos()
    {
        return $this->hasMany(AlunoTurno::className(), ['aluno_id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turno::className(), ['id' => 'turno_id'])->viaTable('aluno_turno', ['aluno_id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamento::className(), ['id_aluno' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresencas()
    {
        return $this->hasMany(Presenca::className(), ['id_perfil' => 'id_perfil']);
    }

    /**
     * @return int
     */
    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    /**
     * @param int $id_perfil
     */
    public function setIdPerfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;
    }

    /**
     * @return int
     */
    public function getIdCurso()
    {
        return $this->id_curso;
    }

    /**
     * @param int $id_curso
     */
    public function setIdCurso($id_curso)
    {
        $this->id_curso = $id_curso;
    }


}
