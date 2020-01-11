<?php
namespace app\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Created by PhpStorm.
 * User: Simão Marques
 * Date: 02/01/2020
 * Time: 01:05
 */

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';
}