<?php
namespace app\modules\v1\controllers;

use app\models\Curso;
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

class PerfilController extends ActiveController
{
    public $modelClass = 'app\models\Perfil';

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
        $model = $modelClass::find()->where(['id_user' => $iduser])->one();

        if ($model === null)
            throw new \yii\web\NotFoundHttpException("O perfil nao existe!");

        return $model;
    }

    public function actionCustom()
    {

    }
}