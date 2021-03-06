<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RegistoFaltaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registo-falta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data_inicio') ?>

    <?= $form->field($model, 'data_fim') ?>

    <?= $form->field($model, 'num_horas') ?>

    <?= $form->field($model, 'id_perfil') ?>

    <?php // echo $form->field($model, 'id_tipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
