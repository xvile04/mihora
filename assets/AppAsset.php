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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'plugins/jquery/jquery-ui.min.css',
        'plugins/calendar/fullcalendar.css'
    ];
    public $js = [
        //'plugins/jquery/jquery-ui.js',
        'plugins/lib/moment.min.js',
        'plugins/calendar/fullcalendar.min.js',
        //'js/calendar.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapAsset'        
    ];
}
