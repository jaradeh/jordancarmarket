<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/master.css',
    ];
    public $js = [
        '/js/jquery-1.11.3.min.js',
        '/js/jquery-ui.min.js',
        '/js/bootstrap.min.js',
        '/js/modernizr.custom.js',
        '/asset/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js',
        '/js/waypoints.min.js',
        '/js/jquery.easypiechart.min.js',
        '/js/classie.js',
        '/asset/owl-carousel/owl.carousel.min.js',
        '/asset/bxslider/jquery.bxslider.js',
        '/asset/slider/jquery.ui-slider.js',
        '/js/jquery.smooth-scroll.js',
        '/js/wow.min.js',
        '/js/jquery.placeholder.min.js',
        '/js/theme.js',
        '/js/custom.js',
        '/js/back_to_top.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
