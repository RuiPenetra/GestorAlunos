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
        <h3>12</h3>

        <p>Professores</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="#" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>5</h3>

        <p>Testes</p>
      </div>
      <div class="icon">
        <i class="fa fa-calendar"></i>
      </div>
      <a href="#" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>6</h3>

        <p>Disciplinas</p>
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
        <h3>3</h3>

        <p>teste</p>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i>
      </div>
      <a href="#" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
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
            <th>#</th>
            <th>Valor</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>85€</td>
            <td><span class="label label-success">Pago</span></td>
          </tr>
          <tr>
            <td>2</td>
            <td>85€</td>
            <td><span class="label label-success">Pago</span></td>
          </tr>
          <tr>
            <td>3</td>
            <td>85€</td>
            <td><span class="label label-warning">Por pagar</span></td>
          </tr>
          <tr>
            <td>4</td>
            <td>85€</td>
            <td><span class="label label-warning">Por pagar</span></td>
          </tr>
          <tr>
            <td>5</td>
            <td>85€</td>
            <td><span class="label label-danger">Em dívida</span></td>
          </tr>
          <tr>
            <td>6</td>
            <td>85€</td>
            <td><span class="label label-danger">Em dívida</span></td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver todos</a>
  </div>
  <!-- /.box-footer -->
</div>
