<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publicacao".
 *
 * @property int $id
 * @property string $titulo
 * @property string $conteudo
 * @property string $tags
 * @property int $status
 * @property string $create_time
 * @property string $update_time
 * @property int $id_perfil
 *
 * @property Comentario[] $comentarios
 * @property Perfil $perfil
 */
class Publicacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publicacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'conteudo', 'tags', 'status', 'create_time', 'update_time', 'id_perfil'], 'required'],
            [['status', 'id_perfil'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['titulo', 'conteudo', 'tags'], 'string', 'max' => 255],
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
            'titulo' => 'Titulo',
            'conteudo' => 'Conteudo',
            'tags' => 'Tags',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'id_perfil' => 'Id Perfil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id_publicacao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'id_perfil']);
    }
}
