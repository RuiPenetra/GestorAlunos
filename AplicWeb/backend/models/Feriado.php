<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "feriado".
 *
 * @property int $id
 * @property string $dia
 * @property string $nome
 */
class Feriado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feriado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dia'], 'required','message' => 'Introduza o dia'],
            [['nome'], 'required','message' => 'Introduza o nome'],
            [['dia'], 'safe'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dia' => 'Dia:',
            'nome' => 'Nome:',
        ];
    }
}
