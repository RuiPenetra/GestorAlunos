<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "presenca".
 *
 * @property int $id
 * @property int $id_aula
 * @property string $data
 * @property int $id_perfil
 *
 * @property Aula $aula
 * @property Aluno $perfil
 */
class Presenca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presenca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aula'], 'required','message' => 'Tem de selecionar a aula!'],
            [['data'], 'required','message' => 'Tem de escolher uma data!'],
            [['id_perfil'], 'required','message' => 'Tem de selecionar o aluno!'],
            [['id_aula', 'id_perfil'], 'integer'],
            [['data'], 'safe'],
            [['id_aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['id_aula' => 'id']],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['id_perfil' => 'id_perfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_aula' => 'Aula:',
            'data' => 'Data:',
            'id_perfil' => 'Aluno:',
            'perfil.perfil.nome' => 'Aluno:',
            'aula.nome' => 'Disciplina:',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAula()
    {
        return $this->hasOne(Aula::className(), ['id' => 'id_aula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'id_perfil']);
    }
}
