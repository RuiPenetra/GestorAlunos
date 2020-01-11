<?php
namespace app\modules\v1\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * Created by PhpStorm.
 * User: Simão Marques
 * Date: 02/01/2020
 * Time: 00:05
 */

class PagamentoController extends ActiveController
{
    public $modelClass = 'app\models\Pagamento';

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
        $model = $modelClass::find()->where(['id_aluno' => $iduser])->all();

        if ($model === null)
            throw new \yii\web\NotFoundHttpException("O pagamento nao existe!");

        return $model;
    }

    public function actionPago()
    {
        $iduser = \Yii::$app->user->identity->id;
        $modelClass = $this->modelClass;
        $model = $modelClass::find()->where(['id_aluno' => $iduser, 'status' => 1])->all();

        if ($model === null)
            throw new \yii\web\NotFoundHttpException("O pagamento nao existe!");

        return $model;
    }

    public function actionDivida()
    {
        $iduser = \Yii::$app->user->identity->id;
        $modelClass = $this->modelClass;
        $model = $modelClass::find()->where(['id_aluno' => $iduser, 'status' => 0])->all();

        if ($model === null)
            throw new \yii\web\NotFoundHttpException("O pagamento nao existe!");

        return $model;
    }


}