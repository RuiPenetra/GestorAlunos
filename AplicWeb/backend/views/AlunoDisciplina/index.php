<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlunodisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aluno Disciplinas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-disciplina-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aluno Disciplina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'aluno_id',
                'value' => 'aluno.perfil.nome',
            ],
            [
                'attribute' => 'disciplina_id',
                'value' => 'disciplina.nome',
            ],
            'nota',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
