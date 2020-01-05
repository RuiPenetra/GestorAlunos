<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pagamento */

$this->title = 'Criar Pagamento Propina';
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id_user = \Yii::$app->user->identity->id;

?>
<div class="pagamento-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'valor', ['inputOptions' => ['type' => 'number','class' => 'form-control']]); ?>
        <?= $form->field($model, 'data_lim', ['inputOptions' => ['type' => 'date','class' => 'form-control']]); ?>
        <?= $form->field($model, 'status')->dropDownList(['1' => 'Pago', '0' => 'Por Pagar']); ?>
        <?= $form->field($model, 'id_aluno')->hiddenInput(['value'=> $id_user])->label(false) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
