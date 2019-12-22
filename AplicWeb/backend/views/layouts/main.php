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
use yii\helpers\Url;

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
    <body class="hold-transition skin-green fixed hold-transition login-page">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?= Url::toRoute('site/index') ?>" class="logo">
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
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'user-image']); ?>
                                    <span class="hidden-xs"><?= \Yii::$app->user->identity->username ?></span>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                      <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'img-circle']); ?>

                                      <p>
                                        <?= \Yii::$app->user->identity->username ?>
                                        <small>Administrador</small>
                                      </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                      <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat"><i class="fa fa-gear fa-spin"></i> Perfil</a>
                                      </div>
                                      <div class="pull-right">
                                        <a href="<?php echo Url::toRoute(['site/logout']) ?>" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Sair</a>
                                      </div>
                                    </li>
                                  </ul>
                                </li>

                          </header>
                                        <aside class="main-sidebar">
                                            <!-- sidebar: style can be found in sidebar.less -->
                                            <section class="sidebar">
                                                <!-- Sidebar user panel -->
                                                <div class="user-panel">
                                                    <div class="pull-left image">
                                                        <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'img-circle']); ?>
                                                    </div>
                                                    <div class="pull-left info">
                                                        <p> <?= \Yii::$app->user->identity->username ?></p>
                                                        <a href="#"><i class="fa fa-id-card text-success"></i> Administrador</a>
                                                    </div>
                                                </div>
                                                <!-- /.search form -->
                                                <!-- sidebar menu: : style can be found in sidebar.less -->
                                                <ul class="sidebar-menu" data-widget="tree">
                                                    <li class="header"><strong style="color: white; align-content: center;">MENU</strong></li>
                                                    <li class="active">
                                                        <a href="<?= Url::toRoute(['site/index']) ?>">
                                                            <i class="fa fa-home"></i> <span>Home</span>
                                                        </a>
                                                    </li>
                                                    <li class="treeview">
                                                        <a href="#"><i class="fa fa-user"></i> <span>Pessoas</span>
                                                            <span class="pull-right-container">
                                                                <i class="fa fa-angle-left pull-right"></i>
                                                            </span>
                                                        </a>
                                                        <ul class="treeview-menu">
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['user/index']) ?>">
                                                                    <i class="fa fa-users"></i> <span>Utilizadores</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['aluno/index']) ?>">
                                                                    <i class="fa fa-user"></i> <span>Alunos</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['professor/index']) ?>">
                                                                    <i class="fa fa-user"></i> <span>Professores</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['diretorcurso/index']) ?>">
                                                                    <i class="fa fa-user"></i> <span>Diretor Curso</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="treeview">
                                                        <a href="#"><i class="fa fa-th"></i> <span>Escola</span>
                                                            <span class="pull-right-container">
                                                                <i class="fa fa-angle-left pull-right"></i>
                                                            </span>
                                                        </a>
                                                        <ul class="treeview-menu">
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['escola/index']) ?>">
                                                                    <i class="fa fa-user"></i> <span>Escolas</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['tipocurso/index']) ?>">
                                                                    <i class="fa fa-th"></i> <span>Tipos Curso</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['curso/index']) ?>">
                                                                    <i class="fa fa-book"></i> <span>Cursos</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['disciplina/index']) ?>">
                                                                    <i class="fa fa-user"></i> <span>Disciplinas</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="<?= Url::toRoute(['horario/index']) ?>">
                                                                    <i class="fa fa-user"></i> <span>Horários</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="">
                                                        <a href="<?= Url::toRoute(['teste/index']) ?>">
                                                            <i class="fa fa-book"></i> <span>Teste</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </section>
                                            <!-- /.sidebar -->
                                        </aside>
                                        <div class="content-wrapper">
                                            <section class="content">
                                                <?=
                                                Breadcrumbs::widget([
                                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                                ])
                                                ?>
                                                <?= Alert::widget() ?>
                                                <?= $content ?>
                                            </section>
                                        </div>
                                        </div>
                                        <?php $this->endBody() ?>
                                        </body>
                                        </html>
                                        <?php $this->endPage() ?>
