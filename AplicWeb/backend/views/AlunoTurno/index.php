<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlunoturnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alunos nos Turnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-turno-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar o aluno no turno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Nome:',
                'value' => 'aluno.perfil.nome',
            ],
            [
                'attribute' => 'Turno:',
                'value' => 'turno.tipo',
            ],
            [
                'attribute' => 'Disciplina:',
                'value' => 'turno.disciplina.nome',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
