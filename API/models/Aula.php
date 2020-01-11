<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property int $id
 * @property string $nome
 * @property string $inicio
 * @property string $fim
 * @property string $sala
 * @property string $dia
 * @property int $id_turno
 * @property int $id_professor
 * @property int $horario_id
 *
 * @property Turno $turno
 * @property Professor $professor
 * @property Horario $horario
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
            [['nome', 'inicio', 'fim', 'sala', 'dia', 'id_turno', 'id_professor', 'horario_id'], 'required'],
            [['inicio', 'fim'], 'safe'],
            [['id_turno', 'id_professor', 'horario_id'], 'integer'],
            [['nome', 'sala'], 'string', 'max' => 255],
            [['dia'], 'string', 'max' => 45],
            [['id_turno'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['id_turno' => 'id']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id_perfil']],
            [['horario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horario::className(), 'targetAttribute' => ['horario_id' => 'id']],
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
            'dia' => 'Dia',
            'id_turno' => 'Id Turno',
            'id_professor' => 'Id Professor',
            'horario_id' => 'Horario ID',
        ];
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
        return $this->hasOne(Professor::className(), ['id_perfil' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorario()
    {
        return $this->hasOne(Horario::className(), ['id' => 'horario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresencas()
    {
        return $this->hasMany(Presenca::className(), ['id_aula' => 'id']);
    }
}
