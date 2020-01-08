<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagamento".
 *
 * @property int $id
 * @property float $valor
 * @property string $data_lim
 * @property int $status
 * @property int $id_aluno
 *
 * @property Aluno $aluno
 */
class Pagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valor', 'data_lim', 'status', 'id_aluno'], 'required'],
            [['valor'], 'number'],
            [['data_lim'], 'safe'],
            [['status', 'id_aluno'], 'integer'],
            [['id_aluno'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['id_aluno' => 'id_perfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'valor' => 'Valor',
            'data_lim' => 'Data Limite',
            'status' => 'Estado',
            'id_aluno' => 'Aluno',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'id_aluno']);
    }
}
