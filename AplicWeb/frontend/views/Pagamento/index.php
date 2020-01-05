<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PagamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Pagamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Atenção !</h4>
        Esta pagina nao mostra a informacao verdadeira do estado da propina serve apenas para o estudante gerir ele mesmo a informacao.
    </div>
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Pagamentos</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th>Data Limite</th>
                <th>Valor</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
            <?php
              foreach ($pagamentos as $pagamento):
            ?>
                  <tr>
                    <td><a href="<?= Url::toRoute(['pagamento/view', 'id' => $pagamento->id]) ?>"><?= $pagamento->data_lim ?></a></td>
                    <td><?= $pagamento->valor ?>€</td>
                    <?php
                      if ($pagamento->status === 1) {
                       echo '<td><span class="label label-success" title="Significa que o montante está pago!">Pago</span></td>';
                      }
                      else {
                        if ($pagamento->data_lim < date("Y-m-d")) {
                          echo '<td><span class="label label-danger" title="O montante ainda não está pago, mas ainda não passou a data limite!">Em dívida</span></td>';
                        }
                        else {
                          echo '<td><span class="label label-warning" title="O montante ainda não está pago e já passou a data limite!">Por pagar</span></td>';
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
