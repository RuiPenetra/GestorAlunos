<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DiretorCurso */

$this->title = 'Update Diretor Curso: ' . $model->id_professor;
$this->params['breadcrumbs'][] = ['label' => 'Diretor Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_professor, 'url' => ['view', 'id' => $model->id_professor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diretor-curso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
