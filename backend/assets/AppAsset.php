<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
        '/css/font-awesome.min',
        '/backend/web/css/ionicons.min.css',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'css/bootstrap-tagsinput.css',
        'css/custom.css',
        'https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css',
        '/backend/web/css/docs.css',
    ];
    public $js = [
        'tags-bootstrap/bootstrap-tagsinput.min.js',
        'plugins/jQuery/jquery-2.2.3.min.js',
        'bootstrap/js/bootstrap.min.js',
        'plugins/fastclick/fastclick.js',
        'dist/js/app.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/chartjs/Chart.min.js',
        'dist/js/pages/dashboard2.js',
        'dist/js/demo.js',
        'js/custom.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
