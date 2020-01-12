<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Horario */

$this->title = $model->nome;
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
  <div class="row">
    <div class="col-md-3"></div>
    <div class="nav-tabs-custom col-md-6">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#seg" data-toggle="tab" aria-expanded="true">Segunda-Feira</a></li>
        <li class=""><a href="#ter" data-toggle="tab" aria-expanded="false">Terça-Feira</a></li>
        <li class=""><a href="#qua" data-toggle="tab" aria-expanded="false">Quarta-Feira</a></li>
        <li class=""><a href="#qui" data-toggle="tab" aria-expanded="false">Quinta-Feira</a></li>
        <li class=""><a href="#sex" data-toggle="tab" aria-expanded="false">Sexta-Feira</a></li>
        <a href="<?= Url::toRoute('aula/index') ?>" class="pull-right btn btn-info" style="margin-top: 5px">Adicionar Aula</a>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="seg">
          <ul class="timeline">
            <?php

            foreach ($aulas as $aula):
              if($aula->dia === "Segunda-Feira"):
              ?>
            <li class="time-label">
              <span class="bg-red">
                <i class="fa fa-clock-o fa-spin"></i>
                <?= date("H:i", strtotime($aula->inicio)) ?> - <?= date("H:i", strtotime($aula->fim)) ?>
              </span>
            </li>
            <li>
              <i class="fa fa-book bg-blue"></i>
              <div class="timeline-item">
                <span class="time"></span>

                <h3 class="timeline-header"><a href="#"><?= $aula->nome ?></a></h3>

                <div class="timeline-body">
                  Sala: <?= $aula->sala ?>
                </div>

                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Detalhes</a>
                </div>
              </div>
            </li>
            <?php
            endif;
          endforeach; ?>
          </ul>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="ter">
          <ul class="timeline">
            <?php

            foreach ($aulas as $aula):
              if($aula->dia === "Terça-Feira"):
              ?>
            <li class="time-label">
              <span class="bg-red">
                <i class="fa fa-clock-o fa-spin"></i>
                <?= date("H:i", strtotime($aula->inicio)) ?> - <?= date("H:i", strtotime($aula->fim)) ?>
              </span>
            </li>
            <li>
              <i class="fa fa-book bg-blue"></i>
              <div class="timeline-item">
                <span class="time"></span>

                <h3 class="timeline-header"><a href="#"><?= $aula->nome ?></a></h3>

                <div class="timeline-body">
                  Sala: <?= $aula->sala ?>
                </div>

                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Detalhes</a>
                </div>
              </div>
            </li>
            <?php
            endif;
          endforeach; ?>
          </ul>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="qua">
          <ul class="timeline">
            <?php

            foreach ($aulas as $aula):
              if($aula->dia === "Quarta-Feira"):
              ?>
            <li class="time-label">
              <span class="bg-red">
                <i class="fa fa-clock-o fa-spin"></i>
                <?= date("H:i", strtotime($aula->inicio)) ?> - <?= date("H:i", strtotime($aula->fim)) ?>
              </span>
            </li>
            <li>
              <i class="fa fa-book bg-blue"></i>
              <div class="timeline-item">
                <span class="time"></span>

                <h3 class="timeline-header"><a href="#"><?= $aula->nome ?></a></h3>

                <div class="timeline-body">
                  Sala: <?= $aula->sala ?>
                </div>

                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Detalhes</a>
                </div>
              </div>
            </li>
            <?php
            endif;
          endforeach; ?>
          </ul>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="qui">
          <ul class="timeline">
            <?php

            foreach ($aulas as $aula):
              if($aula->dia === "Quinta-Feira"):
              ?>
            <li class="time-label">
              <span class="bg-red">
                <i class="fa fa-clock-o fa-spin"></i>
                <?= date("H:i", strtotime($aula->inicio)) ?> - <?= date("H:i", strtotime($aula->fim)) ?>
              </span>
            </li>
            <li>
              <i class="fa fa-book bg-blue"></i>
              <div class="timeline-item">
                <span class="time"></span>

                <h3 class="timeline-header"><a href="#"><?= $aula->nome ?></a></h3>

                <div class="timeline-body">
                  Sala: <?= $aula->sala ?>
                </div>

                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Detalhes</a>
                </div>
              </div>
            </li>
            <?php
            endif;
          endforeach; ?>
          </ul>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="sex">
          <ul class="timeline">
            <?php

            foreach ($aulas as $aula):
              if($aula->dia === "Sexta-Feira"):
              ?>
            <li class="time-label">
              <span class="bg-red">
                <i class="fa fa-clock-o fa-spin"></i>
                <?= date("H:i", strtotime($aula->inicio)) ?> - <?= date("H:i", strtotime($aula->fim)) ?>
              </span>
            </li>
            <li>
              <i class="fa fa-book bg-blue"></i>
              <div class="timeline-item">
                <span class="time"></span>

                <h3 class="timeline-header"><a href="#"><?= $aula->nome ?></a></h3>

                <div class="timeline-body">
                  Sala: <?= $aula->sala ?>
                </div>

                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Detalhes</a>
                </div>
              </div>
            </li>
            <?php
            endif;
          endforeach; ?>
          </ul>
        </div>
        <!-- /.tab-pane -->
      </div>
        <!-- /.tab-content -->
    </div>
  </div>

</div>
