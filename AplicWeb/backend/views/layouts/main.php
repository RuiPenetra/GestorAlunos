<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\web\View;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php
  if(!Yii::$app->user->isGuest) {
?>
<body class="hold-transition skin-blue fixed hold-transition login-page">
<?php }else { ?>
<body class="bg-light-blue color-palette">
<?php } ?>
<?php $this->beginBody() ?>
  <?php
    if(!Yii::$app->user->isGuest) {
  ?>
    <div class="wrapper">
        <header class="main-header">
          <!-- Logo -->
          <a href="index2.html" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">GestorAlunos</span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">0</span>
                  </a>
                  <ul class="dropdown-menu">

                  </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">0</span>
                  </a>
                  <ul class="dropdown-menu">

                  </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag-o"></i>
                    <span class="label label-danger">0</span>
                  </a>
                  <ul class="dropdown-menu">

                  </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?= Html::img('@web/img/businessman.png', ['alt'=>'imgPerfil', 'class'=>'user-image']); ?>
                    <span class="hidden-xs">Nome de Pessoa</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <?= Html::img('@web/img/businessman.png', ['alt'=>'imgPerfil', 'class'=>'img-circle']); ?>
                      <p>
                        Nome de Pessoa
                        <small>Professor</small>
                      </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="btn-group-vertical btn-block">
                          <a href="" class="btn btn-info"><i class="fa fa-user"></i> Perfil</a>
                          <a href="" class="btn btn-info"><i class="fa fa-gear fa-spin"></i> Configurações Conta</a>
                          <a href="" class="btn btn-info"><i class="fa fa-user-cog"></i> Configurações Perfil</a>
                          <a href="#" class="btn btn-info"><i class="fa fa-sign-out"></i> Sair</a>
                        </div>
                      <!-- /.row -->
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?= Html::img('@web/img/businessman.png', ['alt'=>'imgPerfil', 'class'=>'img-circle']); ?>
            </div>
            <div class="pull-left info">
              <p>Nome de Pessoa</p>
              <a href="#"><i class="fa fa-id-card text-success"></i> Professor</a>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Nav</li>
            <li class="active">
              <a href="#">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <i class="fa fa-user"></i> <span>Alunos</span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <i class="fa fa-book"></i> <span>Disciplinas</span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <i class="fa fa-book"></i> <span>Cursos</span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Horário</span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <i class="fa fa-book"></i> <span>Testes</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <div class="content-wrapper">
        <section class="content">
          <?= Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ]) ?>
          <?= Alert::widget() ?>
          <?= $content ?>
        </section>
        </div>
      </div>
  <?php
    }else{
  ?>
      <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>
  <?php
    }
  ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
