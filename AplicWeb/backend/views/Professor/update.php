<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Professor */

$this->title = 'Update Professor: ' . $model->id_professor;
$this->params['breadcrumbs'][] = ['label' => 'Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_professor, 'url' => ['view', 'id' => $model->id_professor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="professor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
