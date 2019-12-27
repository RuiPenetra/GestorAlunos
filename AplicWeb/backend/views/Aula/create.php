<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TipoCurso;
use backend\models\Turno;
use backend\models\Professor;
use backend\models\Horario;
use backend\models\Disciplina;

/* @var $this yii\web\View */
/* @var $model backend\models\Aula */

$this->title = 'Criar Aula';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'nome')->dropDownList(ArrayHelper::map(Disciplina::find()->all(), 'nome','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'inicio') ?>
      <?= $form->field($model, 'fim') ?>
      <?= $form->field($model, 'sala') ?>
      <?= $form->field($model, 'dia') ?>
      <?= $form->field($model, 'id_turno')->dropDownList(ArrayHelper::map(Turno::find()->all(), 'id','tipo'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map(Professor::find()->all(), 'id_perfil','perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= $form->field($model, 'horario_id')->dropDownList(ArrayHelper::map(Horario::find()->all(), 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
