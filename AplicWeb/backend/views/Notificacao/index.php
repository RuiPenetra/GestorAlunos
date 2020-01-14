<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NotificacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notificações';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Notificação', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                return Html::a('<span class="fa fa-pencil-square-o btn btn-success" style="margin-left: 5px"></span>', $url, [
                            'title' => Yii::t('app', 'Atualizar'),
                ]);
              },
              'delete' => function ($url, $model) {
                  return Html::a('<span class="fa fa-trash-o btn btn-danger" style="margin-left: 5px"></span>', $url, [
                              'title' => Yii::t('app', 'Apagar'),
                  ]);
              }
            ],
            'urlCreator' => function ($action, $model, $key, $index) {
              if ($action === 'view') {
                  $url ='index.php?r=notificacao%2Fview&id='.$model->id;
                  return $url;
              }
              if ($action === 'update') {
                  $url ='index.php?r=notificacao%2Fupdate&id='.$model->id;
                  return $url;
              }
              if ($action === 'delete') {
                  $url ='index.php?r=notificacao%2Fdelete&id='.$model->id;
                  return $url;
              }

            }
          ],
        ],
    ]); ?>

</div>
