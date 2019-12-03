<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RegistoFalta */

$this->title = 'Create Registo Falta';
$this->params['breadcrumbs'][] = ['label' => 'Registo Faltas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registo-falta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
