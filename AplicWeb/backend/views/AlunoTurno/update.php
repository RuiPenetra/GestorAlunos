<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTurno */

$this->title = 'Atualizar Turno do Aluno';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aluno_id, 'url' => ['view', 'aluno_id' => $model->aluno_id, 'turno_id' => $model->turno_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aluno-turno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'aluno_id')->dropDownList(ArrayHelper::map($alunos, 'id_perfil','perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
    <?= $form->field($model, 'turno_id')->dropDownList(ArrayHelper::map($turnos, 'id','tipo', 'disciplina.nome'), ['prompt'=>'Selecione uma Opção']) ?>
    <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
