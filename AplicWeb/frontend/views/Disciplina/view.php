<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Disciplina */

$this->title = 'Unidade Curricular';
$this->params['breadcrumbs'][] = ['label' => 'Unidades Curriculares', 'url' => ['alunodisciplina/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="disciplina-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'abreviatura',
            'professor.perfil.nome',
        ],
    ]) ?>

</div>
