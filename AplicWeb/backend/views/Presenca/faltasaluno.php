<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PresencaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Faltas do '.$aluno->nome;
$this->params['breadcrumbs'][] = $this->title;
$id_user = \Yii::$app->user->identity->id;

?>
<div class="presenca-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <table class="table table-bordered table-striped">
    <thead >
      <tr>
        <th scope="col">Dia da Semana</th>
        <th scope="col">Data</th>
        <th scope="col">Disciplina</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($faltas as $falta):
      ?>
      <tr>
        <td><?=$falta->aula->dia?></td>
        <td><?=$falta->data?></td>
        <td><?=$falta->aula->nome?></td>
        <td class="text-center">
          <?= Html::a('<span class="far fa-eye"></span>', ['view','id'=>$falta->id], ['class' => 'btn btn-warning']) ?>
        </td>
      </tr>
      <?php
        endforeach;
      ?>
    </tbody>
  </table>


</div>
