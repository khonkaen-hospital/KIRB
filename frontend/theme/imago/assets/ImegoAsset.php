<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\theme\imago\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ImegoAsset extends AssetBundle
{
    public $sourcePath  = '@frontend/theme/imago/assets_resource';

    public $css = [
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/jquery.bxslider.css',
        'css/magnific-popup.css',
        'css/animate.css',
        'css/settings.css',
        'css/style.css'

    ];

    public $js = [
        'js/jquery.migrate.js',
        'js/owl.carousel.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.bxslider.min.js',
        'js/jquery.appear.js',
        'js/jquery.countTo.js',
        'js/jquery.imagesloaded.min.js',
        'js/jquery.isotope.min.js',
        'js/retina-1.1.0.min.js',
        'js/plugins-scroll.js',
        'js/smooth-scroll.js',
        'js/waypoint.min.js',
        'js/jquery.themepunch.tools.min.js',
        'js/jquery.themepunch.revolution.min.js',
        'http://maps.google.com/maps/api/js?sensor=false',
        'js/gmap3.min.js',
        'js/script.js'
    ];


    // public $depends = [
    //     'yii\web\YiiAsset',
    //     'yii\bootstrap\BootstrapAsset',
    //     'common\assets\Html5shiv',
    // ];
}
