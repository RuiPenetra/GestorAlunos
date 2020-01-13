<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Aula */

$this->title = 'Atualizar Aula: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="aula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nome')->dropDownList(ArrayHelper::map($disciplinas, 'nome','nome')) ?>
      <?= $form->field($model, 'inicio') ?>
      <?= $form->field($model, 'fim') ?>
      <?= $form->field($model, 'sala') ?>
      <?= $form->field($model, 'dia')->dropDownList(['Segunda-Feira' => 'Segunda-Feira', 'Terça-Feira' => 'Terça-Feira', 'Quarta-Feira' => 'Quarta-Feira', 'Quinta-Feira' => 'Quinta-Feira', 'Sexta-Feira' => 'Sexta-Feira']) ?>
      <?= $form->field($model, 'id_turno')->dropDownList(ArrayHelper::map($turnos, 'id','tipo','disciplina.nome')) ?>
      <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map($professores, 'id_perfil','perfil.nome')) ?>
      <?= $form->field($model, 'horario_id')->dropDownList(ArrayHelper::map($horarios, 'id','nome')) ?>
      <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
