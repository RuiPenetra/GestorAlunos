<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="login-box">
  <div class="login-logo">
    <b>Gestor</b>Alunos
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sistema de Autenticação</p>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username', ['options'=>['tag'=>'div', 'class'=>'form-group field-loginform-username has-feedback require'], 'template'=>'{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>{error}{hint}'])->textInput(['placeholder'=>'Email']) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="row">
          <div class="col-xs-8">
            <?= $form->field($model, 'rememberMe')->checkbox()->label('Lembrar-me') ?>
          </div>
          <div class="col-xs-4">
            <?= Html::submitButton('Entrar', ['class' => 'btn btn-info btn-block btn-flat', 'name' => 'login-button']) ?>
          </div>
        </div>
        <div class="row">
          <br>
          <br>
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <a class="btn btn-info btn-block" href="#">
              <i class="fa fa-mobile fa-2x"></i><br> Entrar pelo Smartphone
            </a>
          </div>
        </div>

    <?php ActiveForm::end(); ?>

  </div>
  <!-- /.login-box-body -->
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
