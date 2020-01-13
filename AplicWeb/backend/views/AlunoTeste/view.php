<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTeste */

$this->title = $model->aluno->perfil->nome;
$this->params['breadcrumbs'][] = ['label' => 'Aluno Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aluno-teste-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'aluno_id' => $model->aluno_id, 'teste_id' => $model->teste_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'aluno_id' => $model->aluno_id, 'teste_id' => $model->teste_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
                'label' => 'Nome: ',
                'value' => $model->aluno->perfil->nome,
            ],
            [
                'label' => 'Disciplina: ',
                'value' => $model->teste->disciplina->nome,
            ],
            'nota',
        ],
    ])
    ?>

</div>
