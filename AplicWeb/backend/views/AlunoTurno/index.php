<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlunoturnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscricoes Aluno no Turno';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-turno-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Aluno Turno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'aluno_id_perfil',
                'value' => 'aluno_id_perfil.perfil.nome',
            ],
            [
                'attribute' => 'turno_id',
                'value' => 'turno.tipo',
            ],
            [
                'attribute' => 'turno.disciplina.nome',
                'value' => 'turno.disciplina.nome',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
