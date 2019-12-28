<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Horario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="horario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nome',
            'curso.nome',
        ],
    ]) ?>

    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Segunda-Feira</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Terça-Feira</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Quarta-Feira</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Quinta-Feira</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Sexta-Feira</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <ul class="timeline">
            <li class="time-label">
              <span class="bg-red">
                8:00 - 9:00
              </span>
            </li>
            <li>
              <i class="fa fa-book bg-blue"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o fa-spin"></i> algo</span>

                <h3 class="timeline-header"><a href="#">Aula de Programacao</a> ...</h3>

                <div class="timeline-body">
                  Texto
                </div>

                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Detalhes</a>
                </div>
              </div>
            </li>

            <li class="time-label">
              <span class="bg-red">
                9:00 - 10:00
              </span>
            </li>
            <li>
              <i class="fa fa-book bg-blue"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o fa-spin"></i> 8:00 - 9:00</span>

                <h3 class="timeline-header"><a href="#">Aula de Programacao</a> ...</h3>

                <div class="timeline-body">
                  Texto
                </div>

                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Detalhes</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
        </div>
        <!-- /.tab-pane -->
      </div>
        <!-- /.tab-content -->
    </div>

</div>
