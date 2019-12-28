<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Teste */

$this->title = 'Atualizar Teste: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="teste-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'data',['inputOptions' => ['id' => 'datepicker', 'class' => 'form-control']]); ?>
        <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(Professor::find()->all(), 'id_perfil','perfil.nome')) ?>
        <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(Curso::find()->all(), 'id','nome')) ?>
        <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
