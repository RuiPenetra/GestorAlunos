<?php

use yii\helpers\Html;
use backend\models\Perfil;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Professor */

$this->title = 'Update Professor: ' . $model->id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perfil, 'url' => ['view', 'id' => $model->id_perfil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="professor-update">

    <h1>Atualizar Professor</h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map(Perfil::find()->all(), 'id_user','nome')) ?>
      <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
