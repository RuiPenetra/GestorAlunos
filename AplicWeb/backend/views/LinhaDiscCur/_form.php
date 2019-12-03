<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LinhaDiscCur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linha-disc-cur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_curso')->textInput() ?>

    <?= $form->field($model, 'id_disc')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
