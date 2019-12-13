<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id_user
 * @property string $nome
 * @property string $email
 * @property string $genero
 * @property int $telemovel
 * @property string $datanascimento
 *
 * @property Aluno $aluno
 * @property Comentario[] $comentarios
 * @property User $user
 * @property Professor $professor
 * @property Publicacao[] $publicacaos
 * @property RegistoFalta[] $registoFaltas
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'genero', 'telemovel', 'datanascimento'], 'required'],
            [['telemovel'], 'integer'],
            [['datanascimento'], 'safe'],
            [['nome', 'email', 'genero'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'nome' => 'Nome',
            'email' => 'Email',
            'genero' => 'Genero',
            'telemovel' => 'Telemovel',
            'datanascimento' => 'Datanascimento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id_perfil' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_perfil' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicacaos()
    {
        return $this->hasMany(Publicacao::className(), ['id_perfil' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistoFaltas()
    {
        return $this->hasMany(RegistoFalta::className(), ['id_perfil' => 'id_user']);
    }
}
