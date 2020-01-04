<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlunoTurno */

$this->title = 'Update Aluno Turno: ' . $model->aluno_id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aluno_id_perfil, 'url' => ['view', 'aluno_id_perfil' => $model->aluno_id_perfil, 'turno_id' => $model->turno_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aluno-turno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
