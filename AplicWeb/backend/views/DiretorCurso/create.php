<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Perfil;

/* @var $this yii\web\View */
/* @var $model backend\models\DiretorCurso */

$this->title = 'Create Diretor Curso';
$this->params['breadcrumbs'][] = ['label' => 'Diretor Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diretor-curso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'id_professor')->dropDownList(ArrayHelper::map(Perfil::find()->all(), 'id','nome')) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
