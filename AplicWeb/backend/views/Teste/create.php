<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Perfil;
use backend\models\Curso;
use backend\models\Teste;


/* @var $this yii\web\View */
/* @var $model backend\models\Teste */

$this->title = 'Create Teste';
$this->params['breadcrumbs'][] = ['label' => 'Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'data'); ?>
        <input type="text" class="form-control pull-right" id="datepicker">
        <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(Perfil::find()->all(), 'id','nome'), ['prompt'=>'Seleciona']) ?>
        <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(Curso::find()->all(), 'id','nome'), ['prompt'=>'Seleciona']) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

<!--<div class="form-group">
                <label>Date masks:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                </div>
              </div>
</div>-->

