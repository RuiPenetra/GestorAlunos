<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LinhaDiscCur */

$this->title = $model->id_curso;
$this->params['breadcrumbs'][] = ['label' => 'Linha Disc Curs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="linha-disc-cur-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_curso' => $model->id_curso, 'id_disc' => $model->id_disc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_curso' => $model->id_curso, 'id_disc' => $model->id_disc], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_curso',
            'id_disc',
        ],
    ]) ?>

</div>
