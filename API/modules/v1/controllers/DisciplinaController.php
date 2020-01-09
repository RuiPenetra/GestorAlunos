<?php

namespace app\modules\v1\controllers;

use yii\web\Controller;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;

/**
 * DisciplinaController implements the CRUD actions for Disciplina model.
 */
class DisciplinaController extends \yii\rest\ActiveController
{
  public $modelClass = 'app\models\Disciplina';

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
}
