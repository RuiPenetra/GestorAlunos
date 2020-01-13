<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Curso */

$this->title = 'Create Curso';
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-create">

    <h1>Criar Curso</h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nome') ?>
      <?= $form->field($model, 'abreviatura') ?>
      <?= $form->field($model, 'ano')->dropDownList(['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'tipo_curso')->dropDownList(ArrayHelper::map($tiposcurso, 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'id_escola')->dropDownList(ArrayHelper::map($escolas, 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'diretor_curso')->dropDownList(ArrayHelper::map($diretorescurso, 'id_professor','professor.perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
