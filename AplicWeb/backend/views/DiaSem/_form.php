<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DiaSem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dia-sem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_horario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
