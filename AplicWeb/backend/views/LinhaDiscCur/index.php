<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LinhaDiscCurSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linha Disc Curs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-disc-cur-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Linha Disc Cur', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_curso',
            'id_disc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
