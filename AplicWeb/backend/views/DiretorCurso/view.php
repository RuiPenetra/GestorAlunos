<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DiretorCurso */

$this->title = $model->professor->perfil->nome;
$this->params['breadcrumbs'][] = ['label' => 'Diretor Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="diretor-curso-view">



    <p>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_professor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'professor.perfil.nome',
            'professor.perfil.email',
            'professor.perfil.genero',
        ],
    ]) ?>

</div>
