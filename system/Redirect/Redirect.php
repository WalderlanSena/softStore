<?php

namespace App\SoftStore\System\Redirect;

use App\SoftStore\System\Session\SessionHandler;

abstract class Redirect
{
    /**
     * @param $route
     * @param array $message
     */
    public static function redirectToRoute($route, $message = [])
    {
        if (count($message) > 0) {
            foreach ($message as $key => $value) {
                SessionHandler::setSession($key, $value);
            }
        }
        return header("Location: $route");
    }
}