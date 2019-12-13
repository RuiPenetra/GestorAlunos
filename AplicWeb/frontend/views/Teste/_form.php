<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teste */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teste-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'sala')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracao')->textInput() ?>

    <?= $form->field($model, 'id_disciplina')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
