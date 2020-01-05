<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AlunotesteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-teste-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <span class="badge bg-red">Ainda não foi feito o teste</span>
    <span class="badge bg-yellow">Feito e à espera de nota</span>
    <span class="badge bg-green">A Nota já está atribuida</span>

    <br>
    <br>
    <?php
      foreach ($alunodisciplinas as $disciplina):
    ?>
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $disciplina->disciplina->nome ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <?php
              foreach ($alunotestes as $alunoteste):
                if ($disciplina->disciplina->id == $alunoteste->teste->id_disciplina):
            ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <?php
                    if ($alunoteste->teste->data > date("Y-m-d H:i:s")) {
                      echo '<div class="small-box bg-red">';
                    }
                    else {
                      if ($alunoteste->nota){
                        echo '<div class="small-box bg-green">';
                      }
                      else{
                        echo '<div class="small-box bg-yellow">';
                      }
                    }
                  ?>
                    <div class="inner">
                      <?php
                        if ($alunoteste->nota){
                          echo '<p>Nota: '.$alunoteste->nota.'</p>';
                        }
                        else{
                          echo '<p>Por lançar</p>';
                        }
                      ?>
                    </div>
                    <a class="small-box-footer"><?= $alunoteste->teste->data ?> <i class="far fa-calendar"></i></a>
                  </div>
                </div>
            <?php
                  endif;
              endforeach;

             ?>
          </div>
          <!-- /.table-responsive -->

        </div>
        <!-- /.box-footer -->
      </div>
    <?php
      endforeach;
    ?>


</div>
</div>
</div>
