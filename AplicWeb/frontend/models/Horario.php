<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property int $id
 * @property string $nome
 * @property int $id_curso
 *
 * @property DiaSem[] $diaSems
 * @property Curso $curso
 */
class Horario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'id_curso'], 'required'],
            [['id_curso'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id']],
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
            'id_curso' => 'Id Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaSems()
    {
        return $this->hasMany(DiaSem::className(), ['id_horario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }
}
