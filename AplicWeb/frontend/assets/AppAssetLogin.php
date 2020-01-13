<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAssetLogin extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        'js/login.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}
