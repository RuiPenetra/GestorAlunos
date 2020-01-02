<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/_all-skins.css',
        'css/bootstrap/bootstrap-datepicker.min.css',
        'css/bootstrap/bootstrap.min.css',
        'css/bootstrap/bootstrap3-wysihtml5.min.css',
        'css/daterangepicker.css',
        'css/ionicons.min.css',
        'css/jquery-jvectormap.css',
        'css/morris.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'css/blue.css',
        'css/calendar/fullcalendar.min.css',
        'css/calendar/fullcalendar.print.min.css',
    ];
    public $js = [
      'js/jquery/jquery.min.js',
      'js/jquery/jquery-ui.min.js',
      'js/jquery/jquery.knob.min.js',
      'js/jquery/jquery.slimscroll.min.js',
      'js/jquery/jquery.sparkline.min.js',
      'https://kit.fontawesome.com/3c3f38dd14.js',
      'js/jquery/jquery-jvectormap-1.2.2.min.js',
      'js/jquery/jquery-jvectormap-world-mill-en.js',
      'js/bootstrap/bootstrap-datepicker.min.js',
      'js/bootstrap/bootstrap.min.js',
      'js/bootstrap/bootstrap3-wysihtml5.all.min.js',
      'js/daterangepicker.js',
      'js/demo.js',
      'js/fastclick.js',
      'js/moment.min.js',
      'js/calendar/fullcalendar.min.js',
      'js/calendar/locale/pt.js',
      'js/morris.min.js',
      'js/raphael.min.js',
      'js/site.js',
      'js/icheck.min.js',
      'js/all.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
