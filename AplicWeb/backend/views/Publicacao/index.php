<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publicacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Publicacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo',
            'conteudo',
            'tags',
            'status',
            //'create_time',
            //'update_time',
            //'id_perfil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
