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
        'css/site.css',
        'css/_all-skins.css',
        'css/bootstrap-datepicker.min.css',
        'css/bootstrap.min.css',
        'css/bootstrap3-wysihtml5.min.css',
        'css/daterangepicker.css',
        'css/ionicons.min.css',
        'css/jquery-jvectormap.css',
        'css/morris.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',

        'css/site.css',
        'css/bootstrap.min.css',
        'css/ionicons.min.css',
        'css/blue.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
    ];
    public $js = [
      'js/jquery.min.js',
      'js/jquery-ui.min.js',
      'js/jquery.knob.min.js',
      'js/jquery.slimscroll.min.js',
      'js/jquery.sparkline.min.js',
      'https://kit.fontawesome.com/3c3f38dd14.js',
      'js/jquery-jvectormap-1.2.2.min.js',
      'js/jquery-jvectormap-world-mill-en.js',
      'js/bootstrap-datepicker.min.js',
      'js/bootstrap.min.js',
      'js/bootstrap3-wysihtml5.all.min.js',
      'js/daterangepicker.js',
      'js/demo.js',
      'js/fastclick.js',
      'js/moment.min.js',
      'js/morris.min.js',
      'js/raphael.min.js',
      'js/dashboard.js',
      'js/site.js',

      'js/jquery.min.js',
      'https://kit.fontawesome.com/3c3f38dd14.js',
      'js/bootstrap.min.js',
      'js/icheck.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
