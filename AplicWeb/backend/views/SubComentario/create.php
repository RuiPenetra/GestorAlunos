<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubComentario */

$this->title = 'Create Sub Comentario';
$this->params['breadcrumbs'][] = ['label' => 'Sub Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-comentario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
