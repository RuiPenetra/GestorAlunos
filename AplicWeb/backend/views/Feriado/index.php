<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FeriadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feriados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feriado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Feriado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'dia',
            'nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
