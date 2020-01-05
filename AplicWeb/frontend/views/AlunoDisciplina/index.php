<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AlunodisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidades Curriculares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-disciplina-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <?php
      for ($i=1; $i < 3; $i++){
   ?>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $i ?> Semestre</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <?php
            foreach ($alunodisciplinas as $disciplina):
              if ($disciplina->disciplina->semestre == $i):
        ?>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <p><?=  $disciplina->disciplina->nome ?></p>
              </div>
              <a href="<?= Url::toRoute(['disciplina/view', 'id' => $disciplina->disciplina->id]) ?>" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php
              endif;
            endforeach;
         ?>
      </div>
    </div>
  </div>
  <?php
    }
  ?>


</div>
