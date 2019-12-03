<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Notificacao */

$this->title = 'Create Notificacao';
$this->params['breadcrumbs'][] = ['label' => 'Notificacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
