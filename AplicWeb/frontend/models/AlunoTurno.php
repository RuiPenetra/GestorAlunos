<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "aluno_turno".
 *
 * @property int $aluno_id
 * @property int $turno_id
 *
 * @property Aluno $aluno
 * @property Turno $turno
 */
class AlunoTurno extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'aluno_turno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['aluno_id', 'turno_id'], 'required'],
            [['aluno_id', 'turno_id'], 'integer'],
            [['aluno_id', 'turno_id'], 'unique', 'targetAttribute' => ['aluno_id', 'turno_id'], 'message' => 'Já se encontra inserido neste turno.'],
            //[['aluno_id'], 'unique', 'targetAttribute' => ['aluno_id'], 'message' => ' Já pertence a um turno.'],
            //[['turno_id'], 'unique', 'targetAttribute' => ['turno_id'], 'message' => 'Já pertence a este turno.'],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id' => 'id_perfil']],
            [['turno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'aluno_id' => 'Aluno: ',
            'turno_id' => 'Escolha o turno: ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno() {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'aluno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno() {
        return $this->hasOne(Turno::className(), ['id' => 'turno_id']);
    }

}
