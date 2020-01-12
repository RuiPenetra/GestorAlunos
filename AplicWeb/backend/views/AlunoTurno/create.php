<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTurno */

$this->title = 'Inscrever Aluno no Turno';
$this->params['breadcrumbs'][] = ['label' => 'Inscricoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-turno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'aluno_id_perfil')->dropDownList(ArrayHelper::map($alunos, 'id_perfil','perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
    <?= $form->field($model, 'turno_id')->dropDownList(ArrayHelper::map($turnos, 'id','tipo', 'disciplina.nome'), ['prompt'=>'Selecione uma Opção']) ?>
    <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
