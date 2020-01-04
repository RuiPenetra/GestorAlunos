<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aluno_turno".
 *
 * @property int $aluno_id_perfil
 * @property int $turno_id
 *
 * @property Aluno $alunoIdPerfil
 * @property Turno $turno
 */
class AlunoTurno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aluno_turno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aluno_id_perfil', 'turno_id'], 'required'],
            [['aluno_id_perfil', 'turno_id'], 'integer'],
            [['aluno_id_perfil', 'turno_id'], 'unique', 'targetAttribute' => ['aluno_id_perfil', 'turno_id']],
            [['aluno_id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id_perfil' => 'id_perfil']],
            [['turno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
          'aluno_id_perfil' => 'Nome',
          'turno_id' => 'Turno',
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
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['id' => 'turno_id']);
    }
}
