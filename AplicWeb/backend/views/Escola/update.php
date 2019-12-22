<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Escola */

$this->title = 'Update Escola: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Escolas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escola-update">

    <h1>Atualizar Escola</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
