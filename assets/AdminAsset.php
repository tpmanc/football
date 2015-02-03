<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'js/admin/vendor/bower/lumx/dist/css/lumx.css',
        'css/admin/material-design-iconic-font.min.css',
    ];
    public $js = [
        // 'js/admin/materialize.min.js',
        'js/admin/vendor/bower/velocity/velocity.js',
        'js/admin/vendor/bower/moment/min/moment-with-locales.min.js',
        'js/admin/vendor/bower/angular/angular.js',
        'js/admin/vendor/bower/lumx/dist/js/lumx.min.js',
        'js/admin/myApp.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
