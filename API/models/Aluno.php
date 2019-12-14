<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property int $id_perfil
 * @property int $id_curso
 *
 * @property Perfil $perfil
 * @property Curso $curso
 * @property Pagamento[] $pagamentos
 * @property Presenca[] $presencas
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perfil', 'id_curso'], 'required'],
            [['id_perfil', 'id_curso'], 'integer'],
            [['id_perfil'], 'unique'],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_user']],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_perfil' => 'Id Perfil',
            'id_curso' => 'Id Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id_user' => 'id_perfil']);
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
    public function getPagamentos()
    {
        return $this->hasMany(Pagamento::className(), ['id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresencas()
    {
        return $this->hasMany(Presenca::className(), ['id_perfil' => 'id_perfil']);
    }
}
