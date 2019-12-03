<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DiaSemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dia Sems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-sem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dia Sem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dia',
            'id_horario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
