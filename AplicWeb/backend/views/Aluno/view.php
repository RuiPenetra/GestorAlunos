<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */

$this->title = $model->id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aluno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'headerOptions' => ['style' => 'color:#337ab7'],
            'template' => '{view}{update}{delete}',
            'buttons' => [
              'view' => function ($url, $model) {
                  return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                              'title' => Yii::t('app', 'lead-view'),
                  ]);
              },
  
              'update' => function ($url, $model) {
                  return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                              'title' => Yii::t('app', 'lead-update'),
                  ]);
              },
              'delete' => function ($url, $model) {
                  return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                              'title' => Yii::t('app', 'lead-delete'),
                  ]);
              }
  
            ],
            'urlCreator' => function ($action, $model, $key, $index) {
              if ($action === 'view') {
                  $url ='index.php?r=client-login/lead-view&id='.$model->id;
                  return $url;
              }
  
              if ($action === 'update') {
                  $url ='index.php?r=client-login/lead-update&id='.$model->id;
                  return $url;
              }
              if ($action === 'delete') {
                  $url ='index.php?r=client-login/lead-delete&id='.$model->id;
                  return $url;
              }
  
            }
            ]
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_perfil',
            'id_curso',
        ],
    ]) ?>

</div>
