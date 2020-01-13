<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTeste */

$this->title = 'Update Aluno Teste: ' . $model->aluno_id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aluno_id_perfil, 'url' => ['view', 'aluno_id_perfil' => $model->aluno_id_perfil, 'teste_id' => $model->teste_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aluno-teste-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
