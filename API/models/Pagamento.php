<?php

namespace app\models;

use Yii;
use yii\helpers\Json;

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
            'data_lim' => 'Data Lim',
            'status' => 'Status',
            'id_aluno' => 'Id Aluno',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id_perfil' => 'id_aluno']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $id = $this->id;
        $valor = $this->valor;
        $data_lim = $this->data_lim;
        $status = $this->status;
        $id_aluno = $this->id_aluno;
        $myObj = new \stdClass();
        $myObj->id = $id;
        $myObj->valor = $valor;
        $myObj->data_lim = $data_lim;
        $myObj->status = $status;
        $myObj->id_aluno = $id_aluno;
        $myJSON = Json::encode($myObj);
        var_dump($myObj->data_lim);
        if($insert)
            $this->FazPublish("INSERT",$myJSON);
        else
            $this->FazPublish("UPDATE",$myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $prod_id= $this->id;
        $myObj = new \stdClass();
        $myObj->id = $prod_id;
        $myJSON = Json::encode($myObj);
        $this->FazPublish("DELETE",$myJSON);
    }

    public function FazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = uniqid(); // unique!
        $mqtt = new \app\mosquitto\phpMQTT($server, $port, $client_id);
        try {
            if ($mqtt->connect(true, NULL, $username, $password)) {
                $mqtt->publish($canal, $msg, 0);
                $mqtt->close();
            } else {
                file_put_contents("debug.output", "Time out!");
            }
        }
        catch (\Exception $exception){

        }
    }


}
