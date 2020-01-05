<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlunoTurno */

$this->title = $model->turno->tipo;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aluno-turno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'aluno_id_perfil' => $model->aluno_id_perfil, 'turno_id' => $model->turno_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'aluno_id_perfil' => $model->aluno_id_perfil, 'turno_id' => $model->turno_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende apagar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'turno.tipo',
            'turno.disciplina.nome',
        ],
    ]) ?>

</div>
