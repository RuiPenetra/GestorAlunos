<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipo_falta".
 *
 * @property int $id
 * @property string $nome
 *
 * @property RegistoFalta[] $registoFaltas
 */
class TipoFalta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_falta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
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
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistoFaltas()
    {
        return $this->hasMany(RegistoFalta::className(), ['id_tipo' => 'id']);
    }
}
