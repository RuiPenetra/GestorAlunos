<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "aluno_disciplina".
 *
 * @property int $aluno_id_perfil
 * @property int $disciplina_id
 * @property int|null $nota
 *
 * @property Aluno $alunoIdPerfil
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
            [['aluno_id_perfil', 'disciplina_id'], 'required'],
            [['aluno_id_perfil', 'disciplina_id', 'nota'], 'integer'],
            [['aluno_id_perfil', 'disciplina_id'], 'unique', 'targetAttribute' => ['aluno_id_perfil', 'disciplina_id']],
            [['aluno_id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id_perfil' => 'id_perfil']],
            [['disciplina_id'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['disciplina_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aluno_id_perfil' => 'Aluno Id Perfil',
            'disciplina_id' => 'Disciplina',
            'nota' => 'Nota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoIdPerfil()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'aluno_id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'disciplina_id']);
    }
}
