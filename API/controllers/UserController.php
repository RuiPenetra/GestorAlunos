<?php

namespace app\controllers;

use yii\rest\ActiveController;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends ActiveController
{
  public $modelClass = 'app\models\User';
}
