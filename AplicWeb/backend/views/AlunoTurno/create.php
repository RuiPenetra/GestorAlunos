<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use backend\models\Turno;
use yii\helpers\ArrayHelper;

//use backend\models\Perfil;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoTurno */

$this->title = 'Inscrever aluno num turno';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Turnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-turno-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <!--<?/=
    //$this->render('_form', [
     //   'model' => $model,
    //])
    ?>-->

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'aluno_id_perfil')->dropDownList(ArrayHelper::map($perfis, 'id_user', 'nome'), ['prompt' => 'Selecione uma Opção']) ?>
    <?= $form->field($model, 'turno_id')->dropDownList(ArrayHelper::map($turno, 'id', 'tipo', 'disciplina.nome'), ['prompt' => 'Selecione uma Opção']) ?>
    <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
