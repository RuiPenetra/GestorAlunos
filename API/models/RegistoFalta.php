<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registo_falta".
 *
 * @property int $id
 * @property string $data_inicio
 * @property string $data_fim
 * @property int $num_horas
 * @property int $id_perfil
 * @property int $id_tipo
 *
 * @property Perfil $perfil
 * @property TipoFalta $tipo
 */
class RegistoFalta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registo_falta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_inicio', 'data_fim', 'num_horas', 'id_perfil', 'id_tipo'], 'required'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['num_horas', 'id_perfil', 'id_tipo'], 'integer'],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_user']],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoFalta::className(), 'targetAttribute' => ['id_tipo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
            'num_horas' => 'Num Horas',
            'id_perfil' => 'Id Perfil',
            'id_tipo' => 'Id Tipo',
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
    public function getTipo()
    {
        return $this->hasOne(TipoFalta::className(), ['id' => 'id_tipo']);
    }
}
