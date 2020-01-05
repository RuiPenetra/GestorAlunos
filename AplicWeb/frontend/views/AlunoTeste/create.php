<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AlunoTeste */

$this->title = 'Create Aluno Teste';
$this->params['breadcrumbs'][] = ['label' => 'Aluno Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-teste-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
