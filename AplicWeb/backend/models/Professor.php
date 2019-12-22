<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property int $id_perfil
 *
 * @property Aula[] $aulas
 * @property DiretorCurso $diretorCurso
 * @property Disciplina[] $disciplinas
 * @property Perfil $perfil
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'professor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perfil'], 'required'],
            [['id_perfil'], 'integer'],
            [['id_perfil'], 'unique'],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_perfil' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulas()
    {
        return $this->hasMany(Aula::className(), ['id_professor' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiretorCurso()
    {
        return $this->hasOne(DiretorCurso::className(), ['id_professor' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['id_professor' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id_user' => 'id_perfil']);
    }
}
