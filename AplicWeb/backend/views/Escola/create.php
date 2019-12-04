<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Escola */

$this->title = 'Create Escola';
$this->params['breadcrumbs'][] = ['label' => 'Escolas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escola-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
