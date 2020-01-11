<?php
namespace app\modules\v1\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

/**
 * Created by PhpStorm.
 * User: Simão Marques
 * Date: 02/01/2020
 * Time: 01:05
 */

class TesteController extends ActiveController
{
    public $modelClass = 'app\models\Teste';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
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

    }

    public function actionCustom()
    {

    }
}