<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Turno;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlunoTurno */

$this->title = 'Atualizar Turno';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aluno_id, 'url' => ['view', 'aluno_id' => $model->aluno_id, 'turno_id' => $model->turno_id]];
$this->params['breadcrumbs'][] = 'Atualizar';
$id_user = \Yii::$app->user->identity->id;
?>
<div class="aluno-turno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'turno_id')->dropDownList(ArrayHelper::map(Turno::find()->all(), 'id','tipo','disciplina.nome')) ?>
        <?= $form->field($model, 'aluno_id')->hiddenInput(['value'=> $id_user])->label(false) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
