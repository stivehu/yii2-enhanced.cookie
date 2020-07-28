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
        if (isset($_COOKIE[$cookieName])) {
            $result = $_COOKIE[$cookieName];
        }

        for ($i = 1; $i < 1000; $i++) {
            if (isset($_COOKIE[$cookieName . "---$i"])) {
                $result = $result . $_COOKIE[$cookieName . "---$i"];
            } else {
                break;
            }
        }
        return $result;
    }

    /**
     * @param $cookieName
     */
    public static function cleanBigCookie($cookieName)
    {
        for ($i = 1; $i < 1000; $i++) {
            if (isset($_COOKIE[$cookieName . "---$i"])) {
                unset($_COOKIE[$cookieName . "---$i"]);
            } else {
                break;
            }
        }
    }

}
