<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LinhaDiscCur */

$this->title = 'Create Linha Disc Cur';
$this->params['breadcrumbs'][] = ['label' => 'Linha Disc Curs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-disc-cur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
