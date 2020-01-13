<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoDisciplina */

$this->title = 'Inserir aluno numa disciplina';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Disciplinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-disciplina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- </?=
     $this->render('_form', [
         'model' => $model,
     ])
     ?>-->
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'aluno_id')->dropDownList(ArrayHelper::map($perfis, 'id_user', 'nome'), ['prompt' => 'Selecione uma Opção']) ?>
    <?= $form->field($model, 'disciplina_id')->dropDownList(ArrayHelper::map($disciplina, 'id', 'abreviatura', 'nome'), ['prompt' => 'Selecione uma Opção']) ?>
    <?= $form->field($model, 'nota'); ?>
    <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
</div>
