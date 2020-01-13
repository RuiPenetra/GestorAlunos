<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DiretorCursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diretor Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diretor-curso-index">

    <h1>Diretor Curso</h1>

    <p>
        <?= Html::a('Criar Diretor Curso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_professor',
                'value' => 'professor.perfil.nome',
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
                        $url ='index.php?r=diretorcurso/view&id='.$model->professor->id_perfil;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='index.php?r=diretorcurso/delete&id='.$model->professor->id_perfil;
                        return $url;
                    }

                }
            ],
        ],
    ]); ?>


</div>
