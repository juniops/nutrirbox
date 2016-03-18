<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 3:14 PM
 */

namespace backend\assets;

use yii\web\AssetBundle;

class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/style.css'
    ];
    public $js = [
        'js/app.js',
        'js/plugins/jquery.maskMoney.min.js',
        'js/custom.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\assets\AdminLte',
        'common\assets\AdminLtePlugins',
        'common\assets\Html5shiv'
    ];
}
