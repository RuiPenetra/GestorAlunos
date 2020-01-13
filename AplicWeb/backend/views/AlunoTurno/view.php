<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTurno */

$this->title = $model->aluno->perfil->nome;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aluno-turno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'aluno_id' => $model->aluno_id, 'turno_id' => $model->turno_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Apagar', ['delete', 'aluno_id' => $model->aluno_id, 'turno_id' => $model->turno_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende apagar?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Nome:',
                'value' => /* Lookup::item("aluno.perfil.nome", */ $model->aluno->perfil->nome,
            //'filter' => Lookup::items('aluno.perfil.nome'),
            ],
            [
                'label' => 'Turno:',
                'value' => $model->turno->tipo,
            ],
        ],
    ])
    ?>

</div>
