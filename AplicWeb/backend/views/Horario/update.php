<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Horario */

$this->title = 'Atualizar Horario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="horario-update">

    <h1>Atualizar Horario</h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nome') ?>
      <?= $form->field($model, 'id_curso')->dropDownList(ArrayHelper::map($curso, 'id','nome')) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
