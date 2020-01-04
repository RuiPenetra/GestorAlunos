<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTurno */

$this->title = 'Create Aluno Turno';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-turno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
