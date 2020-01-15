<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\Teste */

$this->title = 'Criar Teste';
$this->params['breadcrumbs'][] = ['label' => 'Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Criar';
?>
<div class="teste-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'data',['inputOptions' => ['id' => 'datetimepicker', 'class' => 'form-control','autocomplete' => 'off']]); ?>
        <?= $form->field($model, 'sala'); ?>
        <?= $form->field($model, 'duracao', ['inputOptions' => ['type' => 'time','class' => 'form-control']]); ?>
        <?= $form->field($model, 'percentagem', ['inputOptions' => ['type' => 'number','class' => 'form-control']]); ?>
        <?= $form->field($model, 'id_disciplina')->dropDownList(ArrayHelper::map($disciplinas, 'id','nome','curso.nome'), ['prompt'=>'Selecione']) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
