<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoCurso */

$this->title = 'Update Tipo Curso: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-curso-update">

    <h1>Atualizar Tipo Curso</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
