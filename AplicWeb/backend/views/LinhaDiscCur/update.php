<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LinhaDiscCur */

$this->title = 'Update Linha Disc Cur: ' . $model->id_curso;
$this->params['breadcrumbs'][] = ['label' => 'Linha Disc Curs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_curso, 'url' => ['view', 'id_curso' => $model->id_curso, 'id_disc' => $model->id_disc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linha-disc-cur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
