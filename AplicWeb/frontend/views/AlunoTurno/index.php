<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AlunoturnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Turnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-turno-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Inscrever no Turno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Pagamentos</h3>

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
                <th>Nome Turno</th>
                <th>Disciplina</th>
              </tr>
            </thead>
            <tbody>
            <?php
              foreach ($dataProvider as $turnoaluno):

            ?>
                  <tr>
                    <td><?= $turnoaluno->turno->tipo; ?></td>
                    <td><?= $turnoaluno->turno->disciplina->nome; ?></td>
                  </tr>
            <?php
              endforeach;
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <a href="<?= Url::toRoute(['pagamento/index']) ?>" class="btn btn-sm btn-default btn-flat pull-right">Ver todos</a>
      </div>
      <!-- /.box-footer -->
    </div>


</div>
