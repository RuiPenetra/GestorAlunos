<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Disciplina */

$this->title = 'Atualizar Disciplina: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Disciplinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="disciplina-update">

    <h1>Atualizar Disciplina</h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'nome') ?>
        <?= $form->field($model, 'abreviatura') ?>
        <?= $form->field($model, 'semestre')->dropDownList(['1'=>'1','2'=>'2']) ?>
        <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map($professores, 'id_perfil','perfil.nome')) ?>
        <?= $form->field($model, 'curso_id')->dropDownList(ArrayHelper::map($cursos, 'id','nome')) ?>
        <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
