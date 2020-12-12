<?php

namespace app\assets;

use yii\web\AssetBundle;

class VenueIndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/venueIndex.css',
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}