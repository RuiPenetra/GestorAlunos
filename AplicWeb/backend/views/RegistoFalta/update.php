<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RegistoFalta */

$this->title = 'Update Registo Falta: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Registo Faltas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registo-falta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
