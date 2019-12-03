<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property int $id
 * @property string $nome
 * @property string $inicio
 * @property string $fim
 * @property string $sala
 * @property int $id_dia
 * @property int $id_turno
 * @property int $id_professor
 *
 * @property DiaSem $dia
 * @property Turno $turno
 * @property Professor $professor
 * @property Presenca[] $presencas
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'inicio', 'fim', 'sala', 'id_dia', 'id_turno', 'id_professor'], 'required'],
            [['inicio', 'fim'], 'safe'],
            [['id_dia', 'id_turno', 'id_professor'], 'integer'],
            [['nome', 'sala'], 'string', 'max' => 255],
            [['id_dia'], 'exist', 'skipOnError' => true, 'targetClass' => DiaSem::className(), 'targetAttribute' => ['id_dia' => 'id']],
            [['id_turno'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['id_turno' => 'id']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id_professor']],
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
            'inicio' => 'Inicio',
            'fim' => 'Fim',
            'sala' => 'Sala',
            'id_dia' => 'Id Dia',
            'id_turno' => 'Id Turno',
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDia()
    {
        return $this->hasOne(DiaSem::className(), ['id' => 'id_dia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['id' => 'id_turno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_professor' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresencas()
    {
        return $this->hasMany(Presenca::className(), ['id_aula' => 'id']);
    }
}
