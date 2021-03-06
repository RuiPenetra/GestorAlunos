<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Atualizar Utilizador ';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

  <p>Pode editar alterando os campos abaixo:</p>

  <div class="row">
      <div class="col-lg-5">
          <?php $form = ActiveForm::begin(['id' => 'form-user']); ?>

          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

          <?= $form->field($model, 'email') ?>

          <?= $form->field($model, 'password_hash')->passwordInput() ?>

          <div class="form-group">
              <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
          </div>

          <?php ActiveForm::end(); ?>
      </div>
  </div>

</div>
