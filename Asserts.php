<?php

namespace stivehu\enhancedcookie;

use Yii;
use yii\web\AssetBundle;

/**
 * Description of Asserts
 *
 * @author stive
 */
class Asserts extends AssetBundle
{

    public $sourcePath = '@enhancedcookie/assets';
    public $js = [
        'jquery.enhanced.cookie.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        Yii::setAlias('@enhancedcookie', __DIR__);
        return parent::init();
    }

}
