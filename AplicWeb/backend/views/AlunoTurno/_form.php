<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTurno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-turno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aluno_id_perfil')->textInput() ?>

    <?= $form->field($model, 'turno_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
