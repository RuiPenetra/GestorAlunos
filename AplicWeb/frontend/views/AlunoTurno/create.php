<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Turno;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlunoTurno */

$this->title = 'Create Aluno Turno';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-turno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'turno_id')->dropDownList(ArrayHelper::map(Turno::find()->all(), 'id','tipo','disciplina.nome'), ['prompt'=>'Selecione uma Opção']) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
