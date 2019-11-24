<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/sidebar.css',
        'css/datatable.css',
        'css/site.css',
    ];
    public $js = [
      'js/font-awesome.js',
      'js/jquery.min.js',
      'js/datatable.js',
      'js/popper.min.js',
      'js/jquery.easing.min.js',
      'js/bootstrap.min.js',
      'js/jquerydatatable.js',
      'js/Chart.min.js',
      'js/tether.min.js',
      'js/backoffice.js',
    ];
    public $depends = [
    ];
}
