<?php

namespace macgyer\yii2materializecss\assets;

use yii\web\AssetBundle;

/**
 * PjaxFormAsset is used to fix pjax affect on siblings.
 */
class PjaxFormAsset extends AssetBundle
{

    public $sourcePath = '@vendor/macgyer/yii2-materializecss/src/assets';
    public $js = [
        'js/pjax-form.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
