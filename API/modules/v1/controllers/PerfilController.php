<?php

namespace app\modules\v1\controllers;

use yii\web\Controller;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;

/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends \yii\rest\ActiveController
{
  public $modelClass = 'app\models\Perfil';

  public function behaviors()
  {
   $behaviors = parent::behaviors();
   $behaviors['authenticator'] = [
     'class' => HttpBasicAuth::className(),
'authMethods' => [
       HttpBasicAuth::className(),
       QueryParamAuth::className(),
 ],
     'auth' => function ($username, $password){
       $user = \app\models\User::findByUsername($username);
       if ($user && $user->validatePassword($password)){
         return $user;
       }
       return null;
     }

   ];
   return $behaviors;
  }
}
