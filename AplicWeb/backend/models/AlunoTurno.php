<?php

namespace backend\models;

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
            [['aluno_id'], 'required', 'message' => 'Tem de selecionar um aluno!'],
            [['turno_id'], 'required', 'message' => 'Tem de selecionar um turno!'],
            [['aluno_id', 'turno_id'], 'integer'],
            [['aluno_id', 'turno_id'], 'unique', 'targetAttribute' => ['aluno_id', 'turno_id']],
            [['aluno_id', 'turno_id'], 'required', 'message' => 'Este campo é obrigatório.'],
            [['aluno_id', 'turno_id'], 'integer', 'message' => 'O valor tem que ser inteiro.'],
            [['aluno_id', 'turno_id'], 'unique', 'targetAttribute' => ['aluno_id', 'turno_id'],'message' => 'Esta combinação já se encontra inserida.'],
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
            'turno_id' => 'Turno: ',
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
