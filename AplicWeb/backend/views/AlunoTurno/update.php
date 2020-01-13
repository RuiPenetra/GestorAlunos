<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTurno */

$this->title = 'Atualizar aluno no turno: ' . $model->aluno_id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aluno_id_perfil, 'url' => ['view', 'aluno_id_perfil' => $model->aluno_id_perfil, 'turno_id' => $model->turno_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aluno-turno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--</?= $this->render('_form', [
         'model' => $model,
     ]) ?>-->
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'aluno_id_perfil')->dropDownList(ArrayHelper::map($perfis, 'id_user', 'nome'), ['prompt' => 'Selecione uma Opção']) ?>
    <?= $form->field($model, 'turno_id')->dropDownList(ArrayHelper::map($turno, 'id', 'tipo', 'disciplina.nome'), ['prompt' => 'Selecione uma Opção']) ?>
    <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
