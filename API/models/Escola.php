<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "escola".
 *
 * @property int $id
 * @property string $nome
 * @property string $abreviatura
 *
 * @property Curso[] $cursos
 */
class Escola extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escola';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'abreviatura'], 'required'],
            [['nome'], 'string', 'max' => 255],
            [['abreviatura'], 'string', 'max' => 45],
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
            'abreviatura' => 'Abreviatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['id_escola' => 'id']);
    }
}
