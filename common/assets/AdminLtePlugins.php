<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 8/2/14
 * Time: 11:40 AM
 */

namespace common\assets;

use yii\web\AssetBundle;

class AdminLtePlugins extends AssetBundle
{
    public $sourcePath = '@bower/admin-lte/plugins';
    public $js = [
        'input-mask/jquery.inputmask.js',
        'input-mask/jquery.inputmask.date.extensions.js',
        'input-mask/jquery.inputmask.extensions.js',
        'input-mask/jquery.inputmask.extensions.js',
        'datepicker/bootstrap-datepicker.js',
        'datepicker/locales/bootstrap-datepicker.pt-BR.js',
        'iCheck/icheck.min.js',
    ];
    public $css = [
        'iCheck/all.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}


