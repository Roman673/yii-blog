<?php

namespace app\assets;
use yii\web\AssetBundle;

class BaseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        'js/jquery-3.3.1.min.js',
        'js/main.js',
    ];
}
