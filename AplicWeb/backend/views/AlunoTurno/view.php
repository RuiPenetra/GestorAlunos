<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTurno */

$this->title = $model->aluno_id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aluno-turno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'aluno_id_perfil' => $model->aluno_id_perfil, 'turno_id' => $model->turno_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'aluno_id_perfil' => $model->aluno_id_perfil, 'turno_id' => $model->turno_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'aluno_id_perfil',
            'turno_id',
        ],
    ]) ?>

</div>