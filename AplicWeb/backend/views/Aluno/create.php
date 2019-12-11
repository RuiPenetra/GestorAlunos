<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Curso;
use backend\models\Perfil;

/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */

$this->title = 'Create Aluno';
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-create">

    <h1><?php Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map(Perfil::find()->all(), 'id','nome'), ['prompt'=>'Seleciona']) ?>
        <?= $form->field($model, 'id_curso')->dropDownList(ArrayHelper::map(Curso::find()->all(), 'id','nome'), ['prompt'=>'Seleciona']) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>



</div>
