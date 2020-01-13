<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Erro
        <?php
            if($this->title == "Method Not Allowed (#405)"){
                echo'405';
            }else{
                echo'404';
            }
        ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= Url::toRoute(['site/index']) ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><?php
                if($this->title == "Method Not Allowed (#405)"){
                    echo'405';
                }else{
                    echo'404';
                }
            ?>
            error</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="error-page">
         <?php
            if($this->title == "Method Not Allowed (#405)"){
                ?>
                <h2 class="headline text-red">405</h2>
            <?php
            }else{
                ?>
                <h2 class="headline text-yellow">404</h2>
            <?php
            }
            ?>

        <div class="error-content">
            <?php
            if($this->title == "Method Not Allowed (#405)"){
            ?><h3><i class="fa fa-warning text-danger"></i> Oops! Não tem permissão!</h3>
            <?php
                }else{
            ?>
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Página não encontrada.</h3>
            <?php
            }
                if($this->title == "Method Not Allowed (#405)"){
            ?>
                <p>
                    Não pode aceder a esta página.<br>
                    Tente contactar os serviços informáticos para detetar o problema!
                </p>
            <?php
                }else{
            ?>
                <p>
                    Não conseguimos encontrar a página que procura.<br>
                    No entanto clique no botão abaixo para voltar à página inicial!
                </p>
            <?php
            }

                if($this->title == "Method Not Allowed (#405)"){
            ?>
            <form class="search-form">
                <a href="<?= Url::toRoute(['site/index']) ?>" class="btn btn-danger btn-flat pull-right"><i class="fa fa-home"></i></a>
                <!-- /.input-group -->
            </form>
            <?php
            }else{
            ?>
            <form class="search-form">
                <a href="<?= Url::toRoute(['site/index']) ?>" class="btn btn-warning btn-flat pull-right"><i class="fa fa-home"></i></a>
                <!-- /.input-group -->
            </form>
            <?php
            }
            ?>
        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
<!-- /.content -->
