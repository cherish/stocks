<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public static function addJs($view, $jsfile) {
        $view->registerJsFile(
                $jsfile, [AppAsset::className(), "depends" => "backend\assets\AppAsset"]
        );
    }

    public static function addCss($view, $cssfile) {
        $view->registerCssFile(
                $cssfile, [AppAsset::className(), "depends" => "backend\assets\AppAsset"]
        );
    }
}
