<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "notificacao".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property string $data_inicio
 * @property string $data_fim
 * @property int $id_tipo
 *
 * @property TipoNotificacao $tipo
 */
class Notificacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notificacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'data_inicio', 'data_fim', 'id_tipo'], 'required'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['id_tipo'], 'integer'],
            [['nome', 'descricao'], 'string', 'max' => 255],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoNotificacao::className(), 'targetAttribute' => ['id_tipo' => 'id']],
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
            'descricao' => 'Descricao',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
            'id_tipo' => 'Id Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(TipoNotificacao::className(), ['id' => 'id_tipo']);
    }
}
