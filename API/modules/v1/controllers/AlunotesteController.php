<?php
namespace app\modules\v1\controllers;

use app\models\Teste;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * Created by PhpStorm.
 * User: Simão Marques
 * Date: 02/01/2020
 * Time: 01:05
 */

class AlunotesteController extends ActiveController
{
    public $modelClass = 'app\models\AlunoTeste';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [

            'class' => 'yii\filters\ContentNegotiator',

            'formats' => [

                'application/json' => Response::FORMAT_JSON,

            ]
        ];
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                [
                    'class' => HttpBasicAuth::className(),
                    'auth' => function ($username, $password){
                        $user = \app\models\User::findByUsername($username);
                        if ($user && $user->validatePassword($password)){
                            return $user;
                        }
                        return null;
                    }
                ],
                QueryParamAuth::className(),
            ],
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index']);
        return $actions;
    }


    public function actionIndex()
    {
        $iduser = \Yii::$app->user->identity->id;
        $modelClass = $this->modelClass;
        $data1 = date("Y-m-d H:i:s",strtotime($_GET['data']." 01:00:00"));
        $data2 = date("Y-m-d H:i:s",strtotime($_GET['data']." 23:00:00"));
        //$testes = $modelClass::find()->where(['aluno_id_perfil' => $iduser])->all();
        $model = Teste::find()->where(['between', 'data', $data1, $data2])->one();

        if ($model === null)
            throw new \yii\web\NotFoundHttpException("O pagamento nao existe!");

        return $model;
    }

}
