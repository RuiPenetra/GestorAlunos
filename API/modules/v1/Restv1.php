<?php

namespace app\modules\v1;

/**
 * Created by PhpStorm.
 * User: Simão Marques
 * Date: 02/01/2020
 * Time: 00:08
 */


class Restv1 extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\v1\controllers';

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }
}