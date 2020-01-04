<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlunoturnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aluno Turnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-turno-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aluno Turno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'aluno_id_perfil',
            'turno_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
