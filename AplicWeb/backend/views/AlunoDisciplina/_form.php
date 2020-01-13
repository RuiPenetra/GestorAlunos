<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoDisciplina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-disciplina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aluno_id')->textInput() ?>

    <?= $form->field($model, 'disciplina_id')->textInput() ?>

    <?= $form->field($model, 'nota')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
