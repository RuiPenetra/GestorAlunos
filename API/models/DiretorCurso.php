<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diretor_curso".
 *
 * @property int $id_professor
 *
 * @property Professor $professor
 */
class DiretorCurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diretor_curso';
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
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id_perfil']],
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
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_perfil' => 'id_professor']);
    }
}
