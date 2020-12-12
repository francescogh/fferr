<?php

namespace app\assets;

use yii\web\AssetBundle;

class PubAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/pub.css',
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}