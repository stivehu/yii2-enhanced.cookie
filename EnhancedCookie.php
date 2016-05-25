<?php

namespace stivehu\enhancedcookie;

use Yii;

/**
 * Description of EnhancedCookie
 *
 * @author stive
 */
class EnhancedCookie
{
    /**
     *
     */
    public function init()
    {
        Asserts::register($this->grid->getView());
        return parent::init();
    }

    /**
     * append the fragmented cookies
     * @param cookie root name
     * @return appended cookie
     */
    public static function getBigCookie($cookieName)
    {
        $result = false;
        if (isset(Yii::$app->request->cookies->get($cookieName))) {
            $result = Yii::$app->request->cookies->get($cookieName);
        }

        for ($i = 1; $i < 1000; $i++) {
            if (isset(Yii::$app->request->cookies->get($cookieName . "---$i"))) {
                $result = $result . Yii::$app->request->cookies->get($cookieName . "---$i");
            } else {
                break;
            }
        }
        return $result;
    }

}
