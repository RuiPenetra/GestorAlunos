<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Notificacao */

$this->title = 'Criar Notificação';
$this->params['breadcrumbs'][] = ['label' => 'Notificação', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nome'); ?>
        <?= $form->field($model, 'descricao'); ?>
        <?= $form->field($model, 'data_inicio',['inputOptions' => ['id' => 'datetimepicker', 'class' => 'form-control','autocomplete' => 'off']]); ?>
        <?= $form->field($model, 'data_fim',['inputOptions' => ['id' => 'datetimepicker1', 'class' => 'form-control','autocomplete' => 'off']]); ?>
        <?= $form->field($model, 'id_tipo')->dropDownList(ArrayHelper::map($notificacoes, 'id','nome'), ['prompt'=>'Selecione']) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
