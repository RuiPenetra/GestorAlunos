<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use frontend\models\AlunoDisciplina;
use frontend\models\Disciplina;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AlunodisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disciplinas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-disciplina-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">1 Semestre</h3>

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
          $id_user = \Yii::$app->user->identity->id;
          $alunodisciplinas = AlunoDisciplina::find()->where(['aluno_id_perfil' => $id_user])->all();
          foreach ($alunodisciplinas as $alunodisciplina){

            $disciplinas = Disciplina::find()->where(['id' => $alunodisciplina->disciplina_id])->all();
            foreach ($disciplinas as $disciplina){
              if ($disciplina->semestre == 1) {
        ?>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <p><?= $disciplina->nome ?></p>
              </div>
              <a href="<?= Url::toRoute(['disciplina/view', 'id' => $disciplina->id]) ?>" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php
              }
            }
          }
         ?>
      </div>
    </div>
  </div>

  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">2 Semestre</h3>

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
          $id_user = \Yii::$app->user->identity->id;
          $alunodisciplinas = AlunoDisciplina::find()->where(['aluno_id_perfil' => $id_user])->all();
          foreach ($alunodisciplinas as $alunodisciplina){

            $disciplinas = Disciplina::find()->where(['id' => $alunodisciplina->disciplina_id])->all();
            foreach ($disciplinas as $disciplina){
              if ($disciplina->semestre == 2) {
        ?>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <p><?= $disciplina->nome ?></p>
              </div>
              <a href="<?= Url::toRoute(['disciplina/view', 'id' => $disciplina->id]) ?>" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php
              }
            }
          }
         ?>
      </div>
    </div>
  </div>


</div>
