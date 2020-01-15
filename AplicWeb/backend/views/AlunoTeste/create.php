<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTeste */

$this->title = 'Criar teste do aluno';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-teste-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--</?= $this->render('_form', [
        'model' => $model,'disciplina.nome'
    ]) ?>-->
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'aluno_id')->dropDownList(ArrayHelper::map($perfis, 'id_user', 'nome'), ['prompt' => 'Selecione uma Opção']) ?>
    <?=
    $form->field($model, 'teste_id')->dropDownList(ArrayHelper::map($teste, 'id', ['data'], ['disciplina.curso.nome']), ['prompt' => 'Selecione uma Opção'])
    ?>
    <?= $form->field($model, 'nota'); ?>
    <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
