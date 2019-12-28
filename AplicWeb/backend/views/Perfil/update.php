<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TipoCurso;
use backend\models\Turno;
use backend\models\Professor;
use backend\models\Horario;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Perfil */

$this->title = 'Update Perfil: ' . $model->id_user;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'id_user')->dropDownList(ArrayHelper::map(User::find()->all(), 'id','username'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'nome') ?>
      <?= $form->field($model, 'email') ?>
      <?= $form->field($model, 'telemovel') ?>
      <?= $form->field($model, 'datanascimento') ?>
      <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
