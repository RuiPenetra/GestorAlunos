<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property int $id
 * @property int $tipo
 * @property int $id_disciplina
 *
 * @property Aula[] $aulas
 * @property TipoTurno $tipo0
 * @property Disciplina $disciplina
 */
class Turno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'turno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'id_disciplina'], 'required'],
            [['tipo', 'id_disciplina'], 'integer'],
            [['tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTurno::className(), 'targetAttribute' => ['tipo' => 'id']],
            [['id_disciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['id_disciplina' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'id_disciplina' => 'Id Disciplina',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulas()
    {
        return $this->hasMany(Aula::className(), ['id_turno' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo0()
    {
        return $this->hasOne(TipoTurno::className(), ['id' => 'tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'id_disciplina']);
    }
}
