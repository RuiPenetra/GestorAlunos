<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Home';
?>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $alunos ?></h3>

                <p>Alunos</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $escolas ?></h3>

                <p>Escolas</p>
            </div>
            <div class="icon">
                <i class="fa fa-home"></i>
            </div>
            <a href="#" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $cursos ?></h3>

                <p>Cursos</p>
            </div>
            <div class="icon">
                <i class="fa fa-th"></i>
            </div>
            <a href="#" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $disciplinas ?></h3>

                <p>Disciplinas</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">Mais Informação <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
