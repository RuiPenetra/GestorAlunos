<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoCurso */

$this->title = 'Atualizar Tipo Curso: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-curso-update">

    <h1>Atualizar Tipo Curso</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
