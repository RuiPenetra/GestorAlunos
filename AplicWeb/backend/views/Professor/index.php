<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfessorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Professores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Professor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_perfil',
                'value' => 'perfil.nome',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="far fa-eye btn btn-primary"></span>', $url, [
                            'title' => Yii::t('app', 'Detalhes'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return null;
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-trash-o btn btn-danger" style="margin-left: 5px"></span>', $url, [
                            'title' => Yii::t('app', 'Apagar'),
                        ]);
                    }

                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='index.php?r=professor/view&id='.$model->id_perfil;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='index.php?r=professor/delete&id='.$model->id_perfil;
                        return $url;
                    }

                }
            ],
        ],
    ]); ?>


</div>
