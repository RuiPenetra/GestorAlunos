<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */

$this->title = 'Atualizar Aluno: ' . $model->perfil->nome;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perfil->nome, 'url' => ['view', 'id' => $model->id_perfil]];
$this->params['breadcrumbs'][] = 'Atualizar';

$curso = $_GET['id'];
$perfil = $_GET['id'];
?>
<div class="aluno-update">

    <h1>Atualizar Aluno</h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map($perfis, 'id_user','nome')) ?>
      <?= $form->field($model, 'id_curso')->dropDownList(ArrayHelper::map($cursos, 'id','nome')) ?>
      <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
