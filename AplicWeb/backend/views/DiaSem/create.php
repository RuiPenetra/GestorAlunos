<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DiaSem */

$this->title = 'Create Dia Sem';
$this->params['breadcrumbs'][] = ['label' => 'Dia Sems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-sem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
