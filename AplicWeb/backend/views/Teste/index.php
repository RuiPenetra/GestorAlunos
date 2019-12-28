<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TesteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Teste', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'data',
            'sala',
            'duracao',
            [
                'attribute' => 'id_disciplina',
                'value' => 'disciplina.nome',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
