<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DiretorCurso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diretor-curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_professor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
