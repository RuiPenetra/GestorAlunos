<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Aluno;
use backend\models\Perfil;
/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */

$this->title = 'Update Aluno: ' . $model->id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perfil, 'url' => ['view', 'id' => $model->id_perfil]];
$this->params['breadcrumbs'][] = 'Update';


?>
<div class="aluno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'id_perfil'); ?>

      <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map(Perfil::find()->where(['id' => 123]),'id_perfil',), ['prompt'=>'Seleciona']) ; ?>

    <?php ActiveForm::end(); ?>

</div>
