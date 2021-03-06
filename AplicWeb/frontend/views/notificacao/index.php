<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\NotificacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notificações';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome',
            'descricao',
            'data_inicio',
            'data_fim',
            //'id_tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
