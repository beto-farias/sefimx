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
        'css/reset.css',
        'css/site.css',
        'webAssets/bootstrap-4.0.0/css/bootstrap.css',
        'webAssets/vendors/DataTables/datatables.min.css',
    ];
    public $js = [
        'webAssets/bootstrap-4.0.0/js/bootstrap.js',
        'webAssets/vendors/DataTables/datatables.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

/*
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'css/reset.css',
        'css/site.css',
        'webAssets/bootstrap-4.0.0/css/bootstrap.css',
        'plugins/sweet-alert/css/sweetalert2.min.css',
        'plugins/toastr/css/toastr.min.css',
        'plugins/ladda/css/ladda.min.css',
        'webAssets/css/switch.css',
        'webAssets/vendors/DataTables/datatables.min.css',
    ];
    public $js = [
        'webAssets/bootstrap-4.0.0/js/bootstrap.js',
        'plugins/ladda/js/spin.min.js',
        'plugins/ladda/js/ladda.min.js',
        'plugins/toastr/js/toastr.min.js',
        'webAssets/js/core.js',
        'webAssets/vendors/DataTables/datatables.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        
    ];
}
*/