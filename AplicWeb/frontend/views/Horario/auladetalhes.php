<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Disciplina */

$this->title = 'Detalhes';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="aula-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <div class="row" style="margin-top:30px" >
    <div class="form-group col-md-6">
      <i class="fa fa-book"></i>
      <label>Unidade Curricular</label>
      <input type="text" value="<?=$aula->nome ?>" class="form-control" disabled>
    </div>

    <div class="form-group col-md-3">
      <i class="fa fa-clock-o"></i>
      <label>Hora inicio</label>
      <input type="text" value="<?= date("H:i", strtotime($aula->inicio))?>" class="form-control" disabled>
    </div>

    <div class="form-group col-md-3">
      <i class="fa fa-clock-o"></i>
      <label>Hora fim</label>
      <input type="text" value="<?= date("H:i", strtotime($aula->fim))?>" class="form-control" disabled>
    </div>

    <div class="form-group col-md-6">
      <i class="fa fa-map-marker"></i>
      <label>Sala</label>
      <input type="text" value="<?=$aula->sala ?>" class="form-control" disabled>
    </div>

    <div class="form-group col-md-6">
      <i class="fa fa-archive"></i>
      <label>Turno</label>
      <input type="text" value="<?=$aula->turno->tipo ?>" class="form-control" disabled>
    </div>

    <div class="form-group col-md-5">
      <i class="fa fa-user"></i>
      <label>Docente</label>
      <input type="text" value="<?=$aula->professor->perfil->nome ?>" class="form-control" disabled>
    </div>
  </div>


</div>
