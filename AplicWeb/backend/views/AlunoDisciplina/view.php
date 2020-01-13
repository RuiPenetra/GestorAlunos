<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoDisciplina */

$this->title = $model->aluno_id;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Disciplinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aluno-disciplina-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'aluno_id' => $model->aluno_id, 'disciplina_id' => $model->disciplina_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'aluno_id' => $model->aluno_id, 'disciplina_id' => $model->disciplina_id], [
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
            'aluno.perfil.nome',
            'disciplina.nome',
            'nota',
        ],
    ]) ?>

</div>
