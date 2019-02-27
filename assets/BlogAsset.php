<?php

namespace app\assets;

use yii\web\AssetBundle;

class BlogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        "css/bootstrap.min.css",
        "css/blog-home.css",
    ];

    public $js = [
        "js/jquery.min.js",
        "js/sripts.js",
        "js/bootstrap.bundle.min.js",
        "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"
    ];

    public $depends = [
        'yii\web\YiiAsset',
        /*'yii\bootstrap\BootstrapPluginAsset',*/
    ];
}