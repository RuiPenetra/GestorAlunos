<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_notificacao".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Notificacao[] $notificacaos
 */
class TipoNotificacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_notificacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required','message' => 'Introduza um nome!'],
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
    public function getNotificacaos()
    {
        return $this->hasMany(Notificacao::className(), ['id_tipo' => 'id']);
    }
}
