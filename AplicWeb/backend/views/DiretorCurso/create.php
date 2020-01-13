<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\DiretorCurso */

$this->title = 'Create Diretor Curso';
$this->params['breadcrumbs'][] = ['label' => 'Diretor Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diretor-curso-create">

    <h1>Criar Diretor Curso</h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map($professores, 'id_perfil','perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
