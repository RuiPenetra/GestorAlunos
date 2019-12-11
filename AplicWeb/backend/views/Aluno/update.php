<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Aluno;
use backend\models\Curso;
use backend\models\Perfil;
/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */

$this->title = 'Update Aluno: ' . $model->id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perfil, 'url' => ['view', 'id' => $model->id_perfil]];
$this->params['breadcrumbs'][] = 'Update';

$curso = $_GET['id'];
$perfil = $_GET['id'];
?>
<div class="aluno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map(Perfil::find()->all(), 'id','nome')) ?>
      <?= $form->field($model, 'id_curso')->dropDownList(ArrayHelper::map(Curso::find()->all(), 'id','nome')) ?>
      <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
