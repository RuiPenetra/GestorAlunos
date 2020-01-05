<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Perfil */

$this->title = 'Atualizar Perfil ';
$this->params['breadcrumbs'][] = 'Perfil';
?>
<div class="perfil-update">

    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'profile-user-img img-responsive img-circle']); ?>
              <h3 class="profile-username text-center"><?= $model->nome ?></h3>

              <p class="text-muted text-center">Aluno</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Numero</b><a class="pull-right">2180635</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b><a class="pull-right"><?= $model->email ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sobre</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Escola</strong>

              <p class="text-muted">
                <?= $model->aluno->curso->escola->nome ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Localizacao</strong>

              <p class="text-muted">Leiria</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Disciplinas</strong>

              <p>
                <span class="label label-danger">Plataformas de sistemas de informacao</span>
                <span class="label label-success">Android</span>
                <span class="label label-info">SIS</span>
                <span class="label label-warning">Projeto</span>
                <span class="label label-primary">Outra</span>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Definições</a></li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane active" id="settings">
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'nome'); ?>
                    <?= $form->field($model, 'email', ['inputOptions' => ['type' => 'email','class' => 'form-control']]); ?>
                    <?= $form->field($model, 'telemovel', ['inputOptions' => ['type' => 'number','class' => 'form-control']]); ?>
                    <?= $form->field($model, 'genero')->dropDownList(['m' => 'Masculino', 'f' => 'Feminino']) ?>
                    <?= $form->field($model, 'datanascimento', ['inputOptions' => ['type' => 'date', 'class' => 'form-control','autocomplete' => 'off']]); ?>
                    <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>


</div>
