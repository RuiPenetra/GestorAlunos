<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubComentario */

$this->title = 'Update Sub Comentario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-comentario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
