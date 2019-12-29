<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Disciplina;

/* @var $this yii\web\View */
/* @var $model backend\models\Turno */

$this->title = 'Criar Turno';
$this->params['breadcrumbs'][] = ['label' => 'Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'tipo') ?>
        <?= $form->field($model, 'id_disciplina')->dropDownList(ArrayHelper::map(Disciplina::find()->all(), 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
