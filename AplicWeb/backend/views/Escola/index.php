<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EscolaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escolas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escola-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Escola', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'abreviatura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
