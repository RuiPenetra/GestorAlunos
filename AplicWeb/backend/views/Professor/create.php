<?php

use yii\helpers\Html;
use backend\models\Perfil;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Professor */

$this->title = 'Create Professor';
$this->params['breadcrumbs'][] = ['label' => 'Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-create">

    <h1>Criar Professor</h1>

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map(Perfil::find()->all(), 'id_user','nome')) ?>
      <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

</div>
