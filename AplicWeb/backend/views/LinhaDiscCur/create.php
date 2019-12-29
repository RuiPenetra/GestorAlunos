<?php

use yii\helpers\Html;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Curso;
use backend\models\Disciplina;

/* @var $this yii\web\View */
/* @var $model backend\models\LinhaDiscCur */

$this->title = 'Criar Linha Disc Cur';
$this->params['breadcrumbs'][] = ['label' => 'Linha Disc Curs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-disc-cur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map(Curso::find()->all(), 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
        <?= $form->field($model, 'id_curso')->dropDownList(ArrayHelper::map(Disciplina::find()->all(), 'id','nome'), ['prompt'=>'Selecione uma Opção']) ?>
        <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
