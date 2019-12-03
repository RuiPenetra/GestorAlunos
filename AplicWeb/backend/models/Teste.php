<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "teste".
 *
 * @property int $id
 * @property string $data
 * @property string $sala
 * @property string $duracao
 * @property int $id_disciplina
 *
 * @property Disciplina $disciplina
 */
class Teste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teste';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'sala', 'duracao', 'id_disciplina'], 'required'],
            [['data', 'duracao'], 'safe'],
            [['id_disciplina'], 'integer'],
            [['sala'], 'string', 'max' => 255],
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
            'data' => 'Data',
            'sala' => 'Sala',
            'duracao' => 'Duracao',
            'id_disciplina' => 'Id Disciplina',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'id_disciplina']);
    }
}
