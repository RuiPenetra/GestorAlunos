<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "linha_disc_cur".
 *
 * @property int $id_curso
 * @property int $id_disc
 *
 * @property Curso $curso
 * @property Disciplina $disc
 */
class LinhaDiscCur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linha_disc_cur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curso', 'id_disc'], 'required'],
            [['id_curso', 'id_disc'], 'integer'],
            [['id_curso', 'id_disc'], 'unique', 'targetAttribute' => ['id_curso', 'id_disc']],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id']],
            [['id_disc'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['id_disc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'id_disc' => 'Id Disc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisc()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'id_disc']);
    }
}
