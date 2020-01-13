<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Aula */

$this->title = 'Criar Aula';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nome')->dropDownList(ArrayHelper::map($disciplinas, 'nome','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'inicio',['inputOptions' => ['id' => 'timepicker', 'class' => 'form-control','autocomplete' => 'off']]) ?>
      <?= $form->field($model, 'fim',['inputOptions' => ['id' => 'timepicker1', 'class' => 'form-control','autocomplete' => 'off']]) ?>
      <?= $form->field($model, 'sala') ?>
      <?= $form->field($model, 'dia')->dropDownList(['Segunda-Feira' => 'Segunda-Feira', 'Terça-Feira' => 'Terça-Feira', 'Quarta-Feira' => 'Quarta-Feira', 'Quinta-Feira' => 'Quinta-Feira', 'Sexta-Feira' => 'Sexta-Feira'], ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'id_turno')->dropDownList(ArrayHelper::map($turnos, 'id','tipo','disciplina.nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map($professores, 'id_perfil','perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'horario_id')->dropDownList(ArrayHelper::map($horarios, 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
