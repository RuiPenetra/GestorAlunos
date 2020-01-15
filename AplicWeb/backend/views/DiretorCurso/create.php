<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\DiretorCurso */

$this->title = 'Criar diretor de curso';
$this->params['breadcrumbs'][] = ['label' => 'Diretor de curso', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diretor-curso-create">

    <h1>Criar diretor de curso</h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map($professores, 'id_perfil','perfil.nome'), ['prompt'=>'Selecione uma Opção']) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
