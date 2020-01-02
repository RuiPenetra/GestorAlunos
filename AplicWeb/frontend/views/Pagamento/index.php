<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                  <td><?= $pagamento->data_lim ?></td>
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
