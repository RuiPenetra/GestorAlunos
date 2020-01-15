<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Presenca */

$this->title = $model->perfil->perfil->nome;
$this->params['breadcrumbs'][] = ['label' => 'Faltas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id_user = \Yii::$app->user->identity->id;
\yii\web\YiiAsset::register($this);
?>
<div class="presenca-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id, 'id_user'=>$id_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Ver faltas do aluno', ['listar', 'id' => $model->id_perfil], ['class' => 'btn btn-warning']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'aula.nome',
            'data',
            'perfil.perfil.nome',
        ],
    ]) ?>

</div>
