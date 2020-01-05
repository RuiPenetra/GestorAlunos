<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TesteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avaliações';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="teste-index">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Avaliações Próximas</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th>Data teste</th>
                <th>Nota</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
            <?php

              foreach ($alunotestes as $teste):
                $notasaiu = 0;
                $date = date_create($teste->teste->data);
            ?>
                  <tr>
                    <td><?= date_format($date, 'd-m-Y H:i'); ?></td>

                    <?php
                        foreach ($teste->teste->alunoTestes as $testea):
                          if($testea->nota != null){
                            $notasaiu=1;
                            echo '<td>'.$testea->nota.'</td>';
                          }
                          else{
                            echo '<td></td>';
                          }
                        endforeach;
                      if ($teste->teste->data > date("Y-m-d H:i:s")) {
                       echo '<td><span class="label label-danger" title="Ainda não chegou o diga do teste!">Por fazer</span></td>';
                      }
                      else {
                        if ($notasaiu==0) {
                          echo '<td><span class="label label-warning" title="A nota ainda não saiu!">A aguardar</span></td>';
                        }
                        else {
                          echo '<td><span class="label label-success" title="A nota já saiu!">Nota Definitiva</span></td>';
                        }
                      }
                     ?>
                  </tr>
            <?php
              endforeach;
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
    </div>

</div>
