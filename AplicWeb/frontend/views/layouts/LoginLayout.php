<?php
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAssetLogin;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

//use yii\web\View;
//use yii\helpers\Url;

AppAssetLogin::register($this);

$this->title = 'Login'
?>
<?php $this->beginPage() ?>

<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>

    <?=
    Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ])
    ?>
    <?= Alert::widget() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
