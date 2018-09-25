<?php

namespace news\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
/*    public $basePath = '@app/web/static';
    public $baseUrl = '@app/web/static';*/
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'static/assets/js/ace-extra.min.js',
        'static/assets/js/html5shiv.js',
        'static/assets/js/jquery-2.0.3.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
