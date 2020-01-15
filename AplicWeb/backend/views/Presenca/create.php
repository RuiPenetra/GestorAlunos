<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Presenca */

$this->title = 'Criar falta';
$this->params['breadcrumbs'][] = ['label' => 'Falta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presenca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_aula')->dropDownList(ArrayHelper::map($aulas, 'id','nome','dia'), ['prompt' => 'Selecione uma Opção']) ?>
        <?= $form->field($model, 'data',['inputOptions' => ['id' => 'datepicker', 'class' => 'form-control','autocomplete' => 'off']]); ?>
        <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map($alunos, 'id_perfil','perfil.nome'), ['prompt'=>'Selecione']) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
