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
    if (!Yii::$app->user->isGuest) {
        ?>
        <body class="hold-transition skin-blue layout-top-nav">
        <?php } else { ?>
        <body class="hold-transition skin-blue hold-transition login-page">
        <?php } ?>
        <?php $this->beginBody() ?>
        <?php
        if (!Yii::$app->user->isGuest) {
            ?>
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
                                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                            <!-- Navbar Right Menu -->
                            <div class="navbar-custom-menu">
                                <ul class="nav navbar-nav">
                                    <!-- Messages: style can be found in dropdown.less-->
                                    <li class="dropdown messages-menu">
                                        <!-- Menu toggle button -->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-envelope-o"></i>
                                            <span class="label label-success">4</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="header">You have 4 messages</li>
                                            <li>
                                                <!-- inner menu: contains the messages -->
                                                <ul class="menu">
                                                    <li><!-- start message -->
                                                        <a href="#">
                                                            <div class="pull-left">
                                                                <!-- User Image -->
                                                                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                            </div>
                                                            <!-- Message title and timestamp -->
                                                            <h4>
                                                                Support Team
                                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                            </h4>
                                                            <!-- The message -->
                                                            <p>Why not buy a new awesome theme?</p>
                                                        </a>
                                                    </li>
                                                    <!-- end message -->
                                                </ul>
                                                <!-- /.menu -->
                                            </li>
                                            <li class="footer"><a href="#">See All Messages</a></li>
                                        </ul>
                                    </li>
                                    <!-- /.messages-menu -->

                                    <!-- Notifications Menu -->
                                    <li class="dropdown notifications-menu">
                                        <!-- Menu toggle button -->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-bell-o"></i>
                                            <span class="label label-warning">10</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="header">You have 10 notifications</li>
                                            <li>
                                                <!-- Inner Menu: contains the notifications -->
                                                <ul class="menu">
                                                    <li><!-- start notification -->
                                                        <a href="#">
                                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                        </a>
                                                    </li>
                                                    <!-- end notification -->
                                                </ul>
                                            </li>
                                            <li class="footer"><a href="#">View all</a></li>
                                        </ul>
                                    </li>
                                    <!-- Tasks Menu -->
                                    <li class="dropdown tasks-menu">
                                        <!-- Menu Toggle Button -->
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-flag-o"></i>
                                            <span class="label label-danger">9</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="header">You have 9 tasks</li>
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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'user-image']); ?>
                                            <span class="hidden-xs"><?= \Yii::$app->user->identity->email ?></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <!-- User image -->
                                            <li class="user-header">
                                                <?= Html::img('@web/img/businessman.png', ['alt' => 'imgPerfil', 'class' => 'img-circle']); ?>
                                                <p>
                                                    <?= \Yii::$app->user->identity->email ?>
                                                    <small>Professor</small>
                                                </p>
                                            </li>
                                            <!-- Menu Body -->
                                            <li class="user-body">
                                                <div class="btn-group-vertical btn-block">
                                                    <a href="" class="btn btn-info"><i class="fa fa-user"></i> Perfil</a>
                                                    <a href="" class="btn btn-info"><i class="fa fa-gear fa-spin"></i> Configurações Conta</a>
                                                    <a href="" class="btn btn-info"><i class="fa fa-user-cog"></i> Configurações Perfil</a>
                                                    <a href="<?php echo Url::toRoute(['site/logout']) ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Sair</a>
                                                </div>
                                                <!-- /.row -->
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
            <?php
        } else {
            ?>
            <?=
            Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>
            <?= Alert::widget() ?>
            <?= $content ?>
            <?php
        }
        ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
