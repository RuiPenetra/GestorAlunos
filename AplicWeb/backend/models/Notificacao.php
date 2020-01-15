<?php

namespace backend\models;

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
            [['nome'], 'required','message' => 'Introduza um nome!'],
            [['descricao'], 'required','message' => 'Introduza uma descrição!'],
            [['data_inicio'], 'required','message' => 'Tem de escolher uma data de inicio!'],
            [['data_fim'], 'required','message' => 'Tem de escolher uma data de fim!'],
            [['id_tipo'], 'required','message' => 'Tem de selecionar um tipo de notificação!'],
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
            'descricao' => 'Descrição',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
            'id_tipo' => 'Tipo',
            'tipo.nome' => 'Tipo',
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
