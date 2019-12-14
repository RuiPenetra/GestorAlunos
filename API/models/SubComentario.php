<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_comentario".
 *
 * @property int $id
 * @property resource $conteudo
 * @property int $status
 * @property string $create_time
 * @property string $update_time
 * @property int $id_comentario
 *
 * @property Comentario $comentario
 */
class SubComentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conteudo', 'status', 'create_time', 'update_time', 'id_comentario'], 'required'],
            [['status', 'id_comentario'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['conteudo'], 'string', 'max' => 255],
            [['id_comentario'], 'exist', 'skipOnError' => true, 'targetClass' => Comentario::className(), 'targetAttribute' => ['id_comentario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'conteudo' => 'Conteudo',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'id_comentario' => 'Id Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentario()
    {
        return $this->hasOne(Comentario::className(), ['id' => 'id_comentario']);
    }
}
