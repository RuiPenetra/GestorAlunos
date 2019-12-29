<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property int $id
 * @property string $tipo
 * @property int $id_disciplina
 *
 * @property Aula[] $aulas
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
            [['id_disciplina'], 'integer'],
            [['tipo'], 'string', 'max' => 45],
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
            'tipo' => 'Nome',
            'id_disciplina' => 'Disciplina',
            'disciplina.nome' => 'Disciplina',
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
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'id_disciplina']);
    }
}
