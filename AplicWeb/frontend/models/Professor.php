<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property int $id_professor
 *
 * @property Aula[] $aulas
 * @property DiretorCurso $diretorCurso
 * @property Disciplina[] $disciplinas
 * @property Perfil $professor
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
            [['id_professor'], 'required'],
            [['id_professor'], 'integer'],
            [['id_professor'], 'unique'],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_professor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulas()
    {
        return $this->hasMany(Aula::className(), ['id_professor' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiretorCurso()
    {
        return $this->hasOne(DiretorCurso::className(), ['id_professor' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['id_professor' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'id_professor']);
    }
}
