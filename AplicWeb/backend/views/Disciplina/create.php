<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Professor;
use backend\models\Curso;

/* @var $this yii\web\View */
/* @var $model backend\models\Disciplina */

$this->title = 'Criar Disciplina';
$this->params['breadcrumbs'][] = ['label' => 'Disciplinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nome') ?>
      <?= $form->field($model, 'abreviatura') ?>
      <?= $form->field($model, 'semestre') ?>
      <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map(Professor::find()->all(), 'id_perfil','perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'curso_id')->dropDownList(ArrayHelper::map(Curso::find()->all(), 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
