<?php

namespace App\SoftStore\System\Session;

abstract class SessionHandler
{
    /**
     * @param $key
     * @param $val
     */
    public static function setSession($key, $val)
    {
        $_SESSION[$key] = $val;
    }
    /**
     * @param $key
     * @return bool
     */
    public static function getSession($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }
    /**
     * @param $keys
     * @return bool
     */
    public static function destroySession($keys)
    {
        if (is_array($keys)) {
            foreach($keys as $key) {
                unset($_SESSION[$key]);
            }
            return true;
        }
        unset($_SESSION[$keys]);
        return true;
    }
}