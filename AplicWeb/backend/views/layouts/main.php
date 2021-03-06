<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\ForbiddenHttpException;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\web\View;
use yii\helpers\Url;
use backend\models\Perfil;
use backend\models\Notificacao;
use backend\models\Teste;
use backend\models\Disciplina;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php
$id_user = \Yii::$app->user->identity->id;
$perfil = Perfil::findOne(['id_user' => $id_user]);
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.png" style="height: 32px" type="image/x-icon" />
        <?php $this->head() ?>
    </head>
    <?php
      $notificacoes= Notificacao::find()->all();
    if (Yii::$app->user->can('permissoesProf')){
        if(Yii::$app->user->can('permissoesDiretor')){
            ?>
         <body class="hold-transition skin-purple fixed hold-transition login-page">
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
                                <li class="dropdown messages-menu">
                                    <a type="button" class="ajax" data-toggle="dropdown">
                                        <i class="fa fa-spin fa-refresh"></i>
                                    </a>
                                </li>
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
                                        <span class="hidden-xs"><?= $perfil->nome ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'img-circle']); ?>

                                            <p>
                                                <?= $perfil->nome ?>
                                                <?php if ($perfil->genero == 'm') { ?>
                                                    <small>Diretor de curso</small>
                                                <?php } else { ?>
                                                    <small>Diretora de curso</small>
                                                <?php } ?>
                                            </p>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo Url::toRoute(['perfil/update', 'id' => $perfil->id_user]) ?>" class="btn btn-default btn-flat"><i class="fa fa-gear fa-spin"></i> Perfil</a>
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
                                <p> <?= $perfil->nome ?></p>
                                <a href="#"><i class="fa fa-id-card text-success"></i>
                                    <?php if ($perfil->genero == 'm') { ?>
                                        <small>Diretor de curso</small>
                                    <?php } else { ?>
                                        <small>Diretora de curso</small>
                                    <?php } ?></a>
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
                                <a href="#"><i class="fa fa-th"></i> <span>Escola</span>
                                    <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                </a>
                                <ul class="treeview-menu">
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
                                    <li class="">
                                        <a href="<?= Url::toRoute(['turno/index']) ?>">
                                            <i class="fa fa-user"></i> <span>Turno</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-bookmark"></i> <span>Inscricoes</span>
                                    <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="">
                                        <a href="<?= Url::toRoute(['alunoturno/index']) ?>">
                                            <i class="fa fa-user"></i> <span>Aluno Turno</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= Url::toRoute(['alunodisciplina/index']) ?>">
                                            <i class="fa fa-th"></i> <span>Aluno Disciplina</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= Url::toRoute(['alunoteste/index']) ?>">
                                            <i class="fa fa-book"></i> <span>Aluno Teste</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="<?= Url::toRoute(['teste/index']) ?>">
                                    <i class="fa fa-book"></i> <span>Teste</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= Url::toRoute(['horario/horariosprofessor']) ?>">
                                    <i class="fa fa-calendar"></i> <span>Horário</span>
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
            <div class="ajax-content">
            </div>
            <?php $this->endBody() ?>
            </body>
            <?php
        }
        else{
?>
        <body class="hold-transition skin-yellow fixed hold-transition login-page">
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
                            <li class="dropdown messages-menu">
                                <a type="button" class="ajax" data-toggle="dropdown">
                                    <i class="fa fa-spin fa-refresh"></i>
                                </a>
                            </li>
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">0</span>
                                </a>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <?php

                                    $noti_total = count($notificacoes);
                                      ?>
                                    <span class="label label-success"><?= $noti_total ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li class="header">Existem
                                    <?php
                                      if($noti_total<1){
                                    ?>
                                        notificatições
                                    <?php
                                      }else{
                                    ?>
                                        notificação
                                    <?php
                                      }
                                    ?>
                                    </li>
                                  <li>
                                      <!-- Inner Menu: contains the notifications -->
                                      <ul class="menu">
                                          <!-- start notification -->
                                          <li>
                                            <?php

                                              foreach ($notificacoes as  $noti) {
                                            ?>
                                              <a href="<?= Url::toRoute(['notificacao/view','id'=>$noti->id]) ?>">
                                                  <?php
                                                    if($noti->tipo->nome == "Avaliação"){
                                                  ?>
                                                    <i class="fa fa-book fa-2x text-yellow" style="margin-right: 20px"></i><?= $noti->nome ?>
                                                  <?php
                                                    }else{
                                                  ?>
                                                    <i class="fa fa-calendar fa-2x text-yellow" style="margin-right: 20px"></i><?= $noti->nome ?>
                                                  <?php
                                                    }
                                                  ?>
                                              </a>
                                            <?php
                                            }
                                           ?>
                                          </li>
                                          <!-- end notification -->
                                      </ul>
                                  </li>
                                  <li class="footer"><a href="<?= Url::toRoute(['notificacao/index']) ?>">Ver todos</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="far fa-bookmark"></i>
                                  <span class="label label-danger"><?//= $testes_total ?></span>
                              </a>
                                <ul class="dropdown-menu">
                                  <li class="header">Existem 0 testes</li>
                                  <li>
                                      <!-- Inner Menu: contains the tests -->
                                      <ul class="menu">
                                          <!-- start tests -->
                                            <li>
                                              <a href="#"></a>
                                            </li>
                                          <!-- end notification -->
                                      </ul>
                                  </li>
                                  <li class="footer"><a href="<?= Url::toRoute(['teste/index']) ?>">Ver todos</a></li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'user-image']); ?>
                                    <span class="hidden-xs"><?= $perfil->nome ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'img-circle']); ?>

                                        <p>
                                            <?= $perfil->nome ?>
                                            <?php if ($perfil->genero == 'm') { ?>
                                                <small>Professor</small>
                                            <?php } else { ?>
                                                <small>Professora</small>
                                            <?php } ?>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo Url::toRoute(['perfil/update', 'id' => $perfil->id_user]) ?>" class="btn btn-default btn-flat"><i class="fa fa-gear fa-spin"></i> Perfil</a>
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
                                            <p> <?= $perfil->nome ?></p>
                                            <a href="#"><i class="fa fa-id-card text-success"></i>
                                                <?php if ($perfil->genero == 'm') { ?>
                                                    <small>Professor</small>
                                                <?php } else { ?>
                                                    <small>Professora</small>
                                                <?php } ?></a>
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
                                            <a href="#"><i class="fa fa-bookmark"></i> <span>Inscricoes</span>
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li class="">
                                                    <a href="<?= Url::toRoute(['alunoturno/index']) ?>">
                                                        <i class="fa fa-user"></i> <span>Aluno Turno</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="<?= Url::toRoute(['alunodisciplina/index']) ?>">
                                                        <i class="fa fa-th"></i> <span>Aluno Disciplina</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="<?= Url::toRoute(['alunoteste/index']) ?>">
                                                        <i class="fa fa-book"></i> <span>Aluno Teste</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="">
                                            <a href="<?= Url::toRoute(['teste/index']) ?>">
                                                <i class="fa fa-book"></i> <span>Teste</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?= Url::toRoute(['presenca/index']) ?>">
                                                <i class="fa fa-pencil fa-fw"></i> <span>Faltas</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?= Url::toRoute(['horario/horariosprofessor']) ?>">
                                                <i class="fa fa-calendar"></i> <span>Horário</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?= Url::toRoute(['notificacao/index']) ?>">
                                                <i class="fa fa-bell-o"></i> <span>Notificação</span>
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
                    <div class="ajax-content">
                    </div>
                    <?php $this->endBody() ?>
                    </body>
    <?php
            }
        }
        elseif(Yii::$app->user->can('gerirPermissoes')){
    ?>
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
                        <li class="dropdown messages-menu">
                            <a type="button" class="ajax" data-toggle="dropdown">
                                <i class="fa fa-spin fa-refresh"></i>
                            </a>
                        </li>
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
                                <span class="hidden-xs"><?= $perfil->nome ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'img-circle']); ?>

                                    <p>
                                        <?= $perfil->nome ?>
                                        <small>Administrador</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo Url::toRoute(['perfil/update', 'id' => $perfil->id_user]) ?>" class="btn btn-default btn-flat perfil"><i class="fa fa-gear fa-spin"></i> Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo Url::toRoute(['site/logout']) ?>" class="btn btn-danger btn-flat sair"><i class="fa fa-sign-out"></i> Sair</a>
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
                        <p> <?= $perfil->nome ?></p>
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
                        <a href="#"><i class="far fa-user"></i> <span>Pessoas</span>
                            <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="<?= Url::toRoute(['user/index']) ?>" class="users">
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
                                <a href="<?= Url::toRoute(['escola/index']) ?>" class="escolas">
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
                            <li class="">
                                <a href="<?= Url::toRoute(['turno/index']) ?>">
                                    <i class="fa fa-user"></i> <span>Turno</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-bookmark"></i> <span>Inscricoes</span>
                            <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="<?= Url::toRoute(['alunoturno/index']) ?>">
                                    <i class="fa fa-user"></i> <span>Aluno Turno</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= Url::toRoute(['alunodisciplina/index']) ?>">
                                    <i class="fa fa-th"></i> <span>Aluno Disciplina</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= Url::toRoute(['alunoteste/index']) ?>">
                                    <i class="fa fa-book"></i> <span>Aluno Teste</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="<?= Url::toRoute(['teste/index']) ?>" class="testes">
                            <i class="fa fa-book"></i> <span>Testes</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::toRoute(['feriado/index']) ?>">
                            <i class="fa fa-calendar"></i> <span>Feriados</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-bell"></i> <span>Notificações</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                             </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="<?= Url::toRoute(['notificacao/index']) ?>">
                                    <i class="fa fa-bell-o"></i> <span>Notificação</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= Url::toRoute(['tiponotificacao/index']) ?>">
                                    <i class="fa fa-certificate"></i> <span>Tipo Notificação</span>
                                </a>
                            </li>
                        </ul>
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
    <div class="ajax-content">
    </div>
    <?php $this->endBody() ?>
    </body>
    <?php
        }
        else{
            throw new ForbiddenHttpException;
        }
    ?>

</html>
<?php $this->endPage() ?>
                    <script >
                        $(document).ajaxStart(function () {
                            Pace.restart()
                        })
                        $('.ajax').click(function () {
                            $.ajax({
                                url: '#', success: function (result) {
                                    location.reload();
                                }
                            })
                        })
                    </script>
