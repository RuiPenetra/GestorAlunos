<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Notificacao */

$this->title = 'Atualizar Notificação';
$this->params['breadcrumbs'][] = ['label' => 'Notificacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="notificacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nome'); ?>
        <?= $form->field($model, 'descricao'); ?>
        <?= $form->field($model, 'data_inicio',['inputOptions' => ['id' => 'datetimepicker', 'class' => 'form-control','autocomplete' => 'off']]); ?>
        <?= $form->field($model, 'data_fim',['inputOptions' => ['id' => 'datetimepicker1', 'class' => 'form-control','autocomplete' => 'off']]); ?>
        <?= $form->field($model, 'id_tipo')->dropDownList(ArrayHelper::map($notificacoes, 'id','nome'), ['prompt'=>'Selecione']) ?>
        <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
