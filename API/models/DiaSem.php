<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dia_sem".
 *
 * @property int $id
 * @property string $dia
 * @property int $id_horario
 *
 * @property Aula[] $aulas
 * @property Horario $horario
 */
class DiaSem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dia_sem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dia', 'id_horario'], 'required'],
            [['id_horario'], 'integer'],
            [['dia'], 'string', 'max' => 255],
            [['id_horario'], 'exist', 'skipOnError' => true, 'targetClass' => Horario::className(), 'targetAttribute' => ['id_horario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dia' => 'Dia',
            'id_horario' => 'Id Horario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulas()
    {
        return $this->hasMany(Aula::className(), ['id_dia' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorario()
    {
        return $this->hasOne(Horario::className(), ['id' => 'id_horario']);
    }
}
