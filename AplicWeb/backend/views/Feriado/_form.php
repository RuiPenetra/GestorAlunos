<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Feriado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feriado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dia')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
