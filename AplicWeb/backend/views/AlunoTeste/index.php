<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlunotesteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aluno Testes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-teste-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aluno Teste', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'aluno_id_perfil',
            [
                'attribute' => 'teste_id',
                //'value' => 'disciplina.nome',
            ],
            'nota',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
