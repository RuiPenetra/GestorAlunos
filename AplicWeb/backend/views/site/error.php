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
            Erro 404
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= Url::toRoute(['site/index']) ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">404 error</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Página não encontrada.</h3>

                <p>
                    Não conseguimos encontrar a página que procura.<br>
                    No entanto clique no botão abaixo para voltar à página inicial!
                </p>

                <form class="search-form">
                        <a href="<?= Url::toRoute(['site/index']) ?>" class="btn btn-warning btn-flat pull-right"><i class="fa fa-home"></i></a>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
