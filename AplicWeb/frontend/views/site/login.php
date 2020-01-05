<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\assets\AppAssetLogin;
use yii\helpers\Url;

AppAssetLogin::register($this);

//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bodyClass">
    <img class="wave" src="img/wave.png">
    <div class="containerClass">
        <div class="imgClass">
            <a href="https://www.ipleiria.pt/" class="aClass"><img src="img/bg.svg" ></a>
        </div>
        <div class="login-content">

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <img src="img/ipl.png">
            <h2 class="title"></h2>
            <div class="input-div one">
                <div class="iClass">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Email</h5>
                    <?= $form->field($model, 'username', ['options' => ['tag' => 'input', 'style' => 'display: none;']])->textInput(['class' => 'input'])->label(false) ?>
                </div>
            </div>
            <div class="input-div pass">
                <div class="iClass">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <?= $form->field($model, 'password', ['options' => ['tag' => 'input', 'style' => 'display: none;']])->textInput(['class' => 'input', 'type' => 'password'])->label(false) ?>
                </div>
            </div>
            <a href="#" class="aClass">Esqueceu a senha?</a>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btnClass', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
