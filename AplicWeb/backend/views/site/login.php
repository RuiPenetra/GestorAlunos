<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\assets\AppAssetLogin;

AppAssetLogin::register($this);

$this->title = 'Login';
?>
<div class="bodyClass">
    <img class="wave" src="img/wave.png">
    <div class="containerClass">
        <div class="imgClass">
            <a href="https://www.ipleiria.pt/" class="aClass"><img src="img/bg.svg" ></a>
        </div>
        <div class="login-content">
            <form class="formClass">

                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'formClass']); ?>
                <img src="img/ipl.png">
                <h2 class="title"></h2>
                <div class="input-div one">
                    <div class="iClass">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>                        
                        <?= $form->field($model, 'username', ['options' => ['tag' => 'input', 'class' => 'input require'], 'template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>{error}{hint}']) ?>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="iClass">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input">
                        <?= $form->field($model, 'password', ['options' => ['tag' => 'input', 'class' => 'input require'], 'template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>{error}{hint}'])->passwordInput() ?>
                    </div>
                </div>
                <a href="#" class="aClass">Esqueceu a senha?</a>
                <?= Html::submitButton('Entrar', ['class' => 'btnClass', 'name' => 'login-button']) ?>

                <?php ActiveForm::end(); ?>
            </form>
        </div>
    </div>
    <div class="bodyClass">
        <img class="wave" src="img/wave.png">
        <div class="containerClass">
            <div class="imgClass">
                <a href="https://www.ipleiria.pt/" class="aClass"><img src="img/bg.svg" ></a>
            </div>
            <div class="login-content">
                <form class="formClass" action="index.html">
                    <img src="img/ipl.png">
                    <h2 class="title"></h2>
                    <div class="input-div one">
                        <div class="iClass">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Email</h5>
                            <input type="text" class="input">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="iClass">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Password</h5>
                            <input type="password" class="input">
                        </div>
                    </div>
                    <a href="#" class="aClass">Esqueceu a senha?</a>
                    <input type="submit" class="btnClass" value="Entrar">
                </form>
            </div>
        </div>
        <script type="text/javascript" src="js/main.js"></script>
    </div>
</div>


<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
