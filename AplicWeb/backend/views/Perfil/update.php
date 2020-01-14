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

              <p class="text-muted text-center">Administrador</p>

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
