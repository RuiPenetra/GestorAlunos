<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Feriado */

$this->title = 'Criar Feriado';
$this->params['breadcrumbs'][] = ['label' => 'Feriados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feriado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'dia',['inputOptions' => ['id' => 'datepicker', 'class' => 'form-control','autocomplete' => 'off']]); ?>
    <?= $form->field($model, 'nome') ?>
    <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
