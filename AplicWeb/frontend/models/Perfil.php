<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $morada
 * @property string $codigopostal
 * @property string $genero
 * @property string $estadocivil
 * @property int $telemovel
 * @property string $datanascimento
 * @property int $iban
 * @property int $numerocontribuinte
 *
 * @property Aluno $aluno
 * @property Comentario[] $comentarios
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
            [['nome', 'email', 'morada', 'codigopostal', 'genero', 'estadocivil', 'telemovel', 'datanascimento', 'iban', 'numerocontribuinte'], 'required'],
            [['telemovel', 'iban', 'numerocontribuinte'], 'integer'],
            [['datanascimento'], 'safe'],
            [['nome', 'email', 'morada', 'codigopostal', 'genero', 'estadocivil'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'morada' => 'Morada',
            'codigopostal' => 'Codigopostal',
            'genero' => 'Genero',
            'estadocivil' => 'Estadocivil',
            'telemovel' => 'Telemovel',
            'datanascimento' => 'Datanascimento',
            'iban' => 'Iban',
            'numerocontribuinte' => 'Numerocontribuinte',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id_perfil' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_professor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicacaos()
    {
        return $this->hasMany(Publicacao::className(), ['id_perfil' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistoFaltas()
    {
        return $this->hasMany(RegistoFalta::className(), ['id_perfil' => 'id']);
    }
}
