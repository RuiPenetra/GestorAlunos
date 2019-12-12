<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id
 * @property string $conteudo
 * @property int $status
 * @property string $create_time
 * @property string $update_time
 * @property int $id_publicacao
 * @property int $id_perfil
 *
 * @property Publicacao $publicacao
 * @property Perfil $perfil
 * @property SubComentario[] $subComentarios
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conteudo', 'status', 'create_time', 'update_time', 'id_publicacao', 'id_perfil'], 'required'],
            [['status', 'id_publicacao', 'id_perfil'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['conteudo'], 'string', 'max' => 255],
            [['id_publicacao'], 'exist', 'skipOnError' => true, 'targetClass' => Publicacao::className(), 'targetAttribute' => ['id_publicacao' => 'id']],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id']],
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
            'id_publicacao' => 'Id Publicacao',
            'id_perfil' => 'Id Perfil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicacao()
    {
        return $this->hasOne(Publicacao::className(), ['id' => 'id_publicacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubComentarios()
    {
        return $this->hasMany(SubComentario::className(), ['id_comentario' => 'id']);
    }
}
