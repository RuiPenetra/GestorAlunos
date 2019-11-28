<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

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
<body>
<?php $this->beginBody() ?>

      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span></button>
          <a class="navbar-brand" href="#">Gestão de <span>Alunos</span></a>
          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
              <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
            </a>
              <ul class="dropdown-menu dropdown-messages">
                <li>
                  <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                    </a>
                    <div class="message-body"><small class="pull-right">3 mins ago</small>
                      <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                  </div>
                </li>
                <li class="divider"></li>
                <li>
                  <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                    </a>
                    <div class="message-body"><small class="pull-right">1 hour ago</small>
                      <a href="#">New message from <strong>Jane Doe</strong>.</a>
                    <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                  </div>
                </li>
                <li class="divider"></li>
                <li>
                  <div class="all-button"><a href="#">
                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                  </a></div>
                </li>
              </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
              <em class="fa fa-bell"></em><span class="label label-info">5</span>
            </a>
              <ul class="dropdown-menu dropdown-alerts">
                <li><a href="#">
                  <div><em class="fa fa-envelope"></em> 1 New Message
                    <span class="pull-right text-muted small">3 mins ago</span></div>
                </a></li>
                <li class="divider"></li>
                <li><a href="#">
                  <div><em class="fa fa-heart"></em> 12 New Likes
                    <span class="pull-right text-muted small">4 mins ago</span></div>
                </a></li>
                <li class="divider"></li>
                <li><a href="#">
                  <div><em class="fa fa-user"></em> 5 New Followers
                    <span class="pull-right text-muted small">4 mins ago</span></div>
                </a></li>
              </ul>
            </li>
            <li class="dropdown">
              <div class="btn-group">
                <button type="button" class="btn btn-danger text-white sairconta" data-toggle="modal" data-target="#ModalSair">Sair</button>
                <button type="button" class="btn btn-primary text-white dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-sort-down"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#"><b>ss</b></a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="model.php?view=perfil&other=perfil"><i class="fa fa-user text-secundary"></i> Perfil</a>
                  <a class="dropdown-item" href="model.php?view=perfil&other=contas"><i class="fa fa-cog fa-users"></i> Contas</a>
                  <a class="dropdown-item" href="model.php?view=perfil&other=insert"><i class="fa fa-plus"></i> Criar Conta</a>
                  <a class="dropdown-item" href="model.php?view=perfil&other=editar"><i class="fa fa-cog fa-spin"></i> Configurações</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item sairconta" href="#" data-toggle="modal" data-target="#ModalSair"><i class="fa fa-sign-out"></i> Sair</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  		<div class="profile-sidebar">
  			<div class="profile-userpic">
  				<img src="/GestorAlunos/AplicWeb/backend/web/img/businessman.png" class="img-responsive" alt="">
  			</div>
  			<div class="profile-usertitle">
  				<div class="profile-usertitle-name">Username</div>
  				<div class="profile-usertitle-status">Cargo</div>
  			</div>
  			<div class="clear"></div>
  		</div>
  		<div class="divider"></div>
  		<ul class="nav menu">
  			<li class="active"><a href="index.html"><em class="fa fa-home">&nbsp;</em> Home</a></li>
  			<li><a href="charts.html"><em class="fa fa-graduation-cap">&nbsp;</em> Cursos</a></li>
  			<li><a href="elements.html"><em class="fa fa-book">&nbsp;</em> Disciplinas</a></li>
  			<li><a href="panels.html"><em class="fa fa-users">&nbsp;</em> Diretores de Curso</a></li>
        <li><a href="widgets.html"><em class="fa fa-users">&nbsp;</em> Professores</a></li>
        <li><a href="widgets.html"><em class="fa fa-users">&nbsp;</em> Utilizadores</a></li>
  			<!-- <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
  				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
  				</a>
  				<ul class="children collapse" id="sub-item-1">
  					<li><a class="" href="#">
  						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
  					</a></li>
  					<li><a class="" href="#">
  						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
  					</a></li>
  					<li><a class="" href="#">
  						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
  					</a></li>
  				</ul>
  			</li> -->
  		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>
  </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
