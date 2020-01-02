<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PerfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Professores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
      foreach ($disciplinas as $disciplina) {
     ?>
    <div class="col-md-4">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-danger">
          <div class="widget-user-image">
            <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'img-circle']); ?>
          </div>
          <!-- /.widget-user-image -->
          <h3 class="widget-user-username"><?= $disciplina->professor->perfil->nome ?></h3>
          <h5 class="widget-user-desc"><?= $disciplina->professor->perfil->email ?></h5>
        </div>
        <div class="box-footer no-padding">
          <ul class="nav nav-stacked">
            <li><a href="<?= Url::toRoute(['disciplina/view', 'id' => $disciplina->id]) ?>"><?= $disciplina->nome ?><span class="pull-right badge bg-warning">UC</span></a></li>
            <li><a href="mailto:<?= $disciplina->professor->perfil->email ?>"><?= $disciplina->professor->perfil->email ?> <span class="pull-right badge bg-aqua">Email</span></a></li>
          </ul>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
    <?php
      }
     ?>
</div>
