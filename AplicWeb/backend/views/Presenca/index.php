<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PresencaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presencas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presenca-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Presenca', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_aula',
            'data',
            'id_perfil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
