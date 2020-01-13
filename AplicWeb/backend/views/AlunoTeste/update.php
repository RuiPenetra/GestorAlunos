<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTeste */

$this->title = 'Update Aluno Teste: ' . $model->aluno_id;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aluno_id, 'url' => ['view', 'aluno_id' => $model->aluno_id, 'teste_id' => $model->teste_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aluno-teste-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <!---</?= $this->render('_form', [
        'model' => $model,
    ]) ?>-->
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'aluno_id')->dropDownList(ArrayHelper::map($perfis, 'id_user', 'nome'), ['prompt' => 'Selecione uma Opção']) ?>
    <?=
    $form->field($model, 'teste_id')->dropDownList(ArrayHelper::map($teste, 'id', /* ['disciplina.nome', 'teste.data'] */ function($element) {
                return $element['data'] . ' --> ' . $element['sala'];
            })
            , ['prompt' => 'Selecione uma Opção'])
    ?>
    <?= $form->field($model, 'nota'); ?>
    <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
</div>
