<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Teste */

$this->title = 'Atualizar Teste: ' . $model->disciplina->nome;
$this->params['breadcrumbs'][] = ['label' => 'Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->disciplina->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="teste-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'data',['inputOptions' => ['id' => 'datetimepicker', 'class' => 'form-control']]); ?>
        <?= $form->field($model, 'sala'); ?>
        <?= $form->field($model, 'duracao', ['inputOptions' => ['type' => 'time','class' => 'form-control']]); ?>
        <?= $form->field($model, 'percentagem', ['inputOptions' => ['type' => 'number','class' => 'form-control']]); ?>
        <?= $form->field($model, 'id_disciplina')->dropDownList(ArrayHelper::map($disciplinas, 'id','nome')) ?>
        <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
