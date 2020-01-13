<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Turno;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlunoTurno */

$this->title = 'Inscrever no Turno';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id_user = \Yii::$app->user->identity->id;
?>
<div class="aluno-turno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'turno_id')->dropDownList(ArrayHelper::map(Turno::find()->all(), 'id','tipo','disciplina.nome'), ['prompt'=>'Selecione uma Opção']) ?>
        <?= $form->field($model, 'aluno_id')->hiddenInput(['value'=> $id_user])->label(false) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
