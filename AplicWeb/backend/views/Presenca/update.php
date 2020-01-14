<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Presenca */

$this->title = 'Atualizar Falta ';
$this->params['breadcrumbs'][] = ['label' => 'Presencas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perfil->perfil->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="presenca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_aula')->dropDownList(ArrayHelper::map($aulas, 'id','nome','dia'), ['prompt' => 'Selecione uma Opção']) ?>
        <?= $form->field($model, 'data',['inputOptions' => ['id' => 'datepicker', 'class' => 'form-control','autocomplete' => 'off']]); ?>
        <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map($alunos, 'id_perfil','perfil.nome'), ['prompt'=>'Selecione']) ?>
        <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
