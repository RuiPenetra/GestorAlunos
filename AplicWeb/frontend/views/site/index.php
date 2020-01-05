<?php
/* @var $this yii\web\View<a href="<?= Url::toRoute('disciplina/index') ?>">Disciplinas</a> */

use yii\helpers\Url;

$this->title = 'Home';
?>

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $disciplinas ?></h3>

        <p>Professores</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="<?= Url::toRoute(['professor/index']) ?>" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= $testes ?></h3>

        <p>Eventos</p>
      </div>
      <div class="icon">
        <i class="fa fa-calendar"></i>
      </div>
      <a href="<?= Url::toRoute(['teste/index']) ?>" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?= $disciplinas ?></h3>

        <p>Unidades Curriculares</p>
      </div>
      <div class="icon">
        <i class="fa fa-th"></i>
      </div>
      <a href="<?= Url::toRoute(['alunodisciplina/index']) ?>" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>0</h3>

        <p>Notas</p>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i>
      </div>
      <a href="<?= Url::toRoute(['alunoteste/index']) ?>" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
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
  <!-- /.box-header -->
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
          $date = date_create($pagamento->data_lim);
        ?>
              <tr>
                <td><?= date_format($date, 'd-m-Y') ?></td>
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
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <a href="<?= Url::toRoute(['pagamento/index']) ?>" class="btn btn-sm btn-default btn-flat pull-right">Ver todos</a>
  </div>
  <!-- /.box-footer -->
</div>


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
            <th>UC</th>
            <th>Nota</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach ($testess as $teste):
            $notasaiu = 0;
            $date = date_create($teste->teste->data);
        ?>
              <tr>
                <td><?= date_format($date, 'd-m-Y H:i'); ?></td>

                <?php
                echo '<td>'.$teste->teste->disciplina->nome.'</td>';
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
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <a href="<?= Url::toRoute(['teste/index']) ?>" class="btn btn-sm btn-default btn-flat pull-right">Ver todos</a>
  </div>
  <!-- /.box-footer -->
</div>
