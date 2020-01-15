<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlunotesteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testes dos alunos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-teste-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('criar o aluno no teste', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Nome:',
                'value' => 'aluno.perfil.nome'
            ],
            [
                'attribute' => 'Disciplina:',
                'value' => 'teste.disciplina.nome',
            ],
            [
                'attribute' => 'Nota:',
                'value' => 'nota',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
