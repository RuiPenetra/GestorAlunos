<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Curso;
use backend\models\Perfil;
use backend\models\Aluno;

/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */

$this->title = 'Create Aluno';
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-create">

    <h1><?php Html::encode($this->title) ?></h1>
    <!--//->where('not like','id_user')-->
    <?php $form = ActiveForm::begin(); ?>
    <?=
    $form->field($model, 'id_perfil')->dropDownList(ArrayHelper::map(Perfil::find()
                            ->where(['not like', 'id_user', (ArrayHelper::map(Aluno::find()
                                        ->all(), 'id_perfil', 'id_curso'))])
                            ->all(), 'id_user', 'nome'), ['prompt' => 'Selecione uma Opção'])
    ?>
    <?=
    $form->field($model, 'id_curso')->dropDownList(ArrayHelper::map(Curso::find()
                            ->all(), 'id', 'nome'), ['prompt' => 'Selecione uma Opção'])
    ?>
    <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end();?>



</div>
