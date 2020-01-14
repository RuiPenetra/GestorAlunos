<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aluno_disciplina".
 *
 * @property int $aluno_id
 * @property int $disciplina_id
 * @property int|null $nota
 *
 * @property Aluno $aluno
 * @property Disciplina $disciplina
 */
class AlunoDisciplina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aluno_disciplina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aluno_id', 'disciplina_id'], 'required'],
            [['aluno_id', 'disciplina_id', 'nota'], 'integer'],
            [['aluno_id', 'disciplina_id'], 'unique', 'targetAttribute' => ['aluno_id', 'disciplina_id']],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id' => 'id_perfil']],
            [['disciplina_id'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['disciplina_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aluno_id' => 'Nome:',
            'disciplina_id' => 'Disciplina:',
            'nota' => 'Nota:',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'aluno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'disciplina_id']);
    }

    /**
     * @return int
     */
    public function getAlunoId()
    {
        return $this->aluno_id;
    }

    /**
     * @param int $aluno_id
     */
    public function setAlunoId($aluno_id)
    {
        $this->aluno_id = $aluno_id;
    }

    /**
     * @return int
     */
    public function getDisciplinaId()
    {
        return $this->disciplina_id;
    }

    /**
     * @param int $disciplina_id
     */
    public function setDisciplinaId($disciplina_id)
    {
        $this->disciplina_id = $disciplina_id;
    }

    /**
     * @return int|null
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param int|null $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
    }


}
