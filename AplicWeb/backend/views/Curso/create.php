<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TipoCurso;
use backend\models\Escola;
use backend\models\DiretorCurso;

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
      <?= $form->field($model, 'ano') ?>
      <?= $form->field($model, 'tipo_curso')->dropDownList(ArrayHelper::map(TipoCurso::find()->all(), 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'id_escola')->dropDownList(ArrayHelper::map(Escola::find()->all(), 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'diretor_curso')->dropDownList(ArrayHelper::map(DiretorCurso::find()->all(), 'id_professor','professor.perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
