<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Professor;

/* @var $this yii\web\View */
/* @var $model backend\models\Disciplina */

$this->title = 'Update Disciplina: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Disciplinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disciplina-update">

    <h1>Atualizar Disciplina</h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nome') ?>
      <?= $form->field($model, 'abreviatura') ?>
      <?= $form->field($model, 'semestre') ?>
      <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map(Professor::find()->all(), 'id_perfil','perfil.nome')) ?>
      <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
