<?php
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\web\View;
use yii\helpers\Url;
use frontend\models\Perfil;
use frontend\models\Notificacao;



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
        <body class="hold-transition skin-blue layout-top-nav">
            <div class="wrapper">
                <header class="main-header">
                    <nav class="navbar navbar-static-top">
                        <div class="container">
                            <div class="navbar-header">
                                <a href="<?= Url::toRoute(['site/index']) ?>" class="navbar-brand">GestorAlunos</a>

                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?= Url::toRoute(['horario/index']) ?>">Horário</a></li>
                                    <li><a href="<?= Url::toRoute(['pagamento/index']) ?>">Pagamentos</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">UCs <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= Url::toRoute(['teste/index']) ?>">Testes</a></li>
                                            <li><a href="<?= Url::toRoute(['alunoteste/index']) ?>">Notas</a></li>
                                            <li><a href="<?= Url::toRoute(['alunodisciplina/index']) ?>">Unidades Curriculares</a></li>
                                            <li><a href="<?= Url::toRoute(['professor/index']) ?>">Professores</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Outros <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= Url::toRoute(['alunoturno/index']) ?>">Turnos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                            <!-- Navbar Right Menu -->
                            <div class="navbar-custom-menu">
                                <ul class="nav navbar-nav">

                                    <!-- Notifications Menu -->
                                    <li class="dropdown notifications-menu">
                                        <!-- Menu toggle button -->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-bell-o"></i>
                                            <?php
                                            $notificacoes= Notificacao::find()->all();
                                            $noti_total = count($notificacoes);
                                              ?>
                                            <span class="label label-warning"><?= $noti_total ?></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="header">Existem <?=$noti_total?> notifications</li>
                                            <li>
                                                <!-- Inner Menu: contains the notifications -->
                                                <ul class="menu">
                                                    <!-- start notification -->
                                                    <li>
                                                      <?php

                                                        foreach ($notificacoes as  $nofi) {
                                                      ?>
                                                        <a href="<?= Url::toRoute(['notificacao/view','id'=>$nofi->id]) ?>">
                                                            <?php
                                                              if($nofi->tipo->nome == "Avaliação"){
                                                            ?>
                                                              <i class="fa fa-book fa-2x text-primary" style="margin-right: 20px"></i><?= $nofi->nome ?>
                                                            <?php
                                                              }else{
                                                            ?>
                                                              <i class="fa fa-calendar fa-2x text-info" style="margin-right: 20px"></i><?= $nofi->nome ?>
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
                                    <!-- Tasks Menu -->
                                    <li class="dropdown tasks-menu">
                                        <!-- Menu Toggle Button -->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="far fa-bookmark"></i>
                                            <span class="label label-danger">9</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="header">Tens 9 testes proximos</li>
                                            <li>
                                                <!-- Inner menu: contains the tasks -->
                                                <ul class="menu">
                                                    <li><!-- Task item -->
                                                        <a href="#">
                                                            <!-- Task title and progress text -->
                                                            <h3>
                                                                Design some buttons
                                                                <small class="pull-right">20%</small>
                                                            </h3>
                                                            <!-- The progress bar -->
                                                            <div class="progress xs">
                                                                <!-- Change the css width attribute to simulate progress -->
                                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                    <span class="sr-only">20% Complete</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <!-- end task item -->
                                                </ul>
                                            </li>
                                            <li class="footer">
                                                <a href="#">View all tasks</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- User Account Menu -->
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
                                            <small>Aluno</small>
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
                                </ul>
                            </div>
                            <!-- /.navbar-custom-menu -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </header>
                <div class="content-wrapper">
                    <div class="container">
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
            </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
