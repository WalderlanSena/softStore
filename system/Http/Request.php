<?php


namespace App\SoftStore\System\Http;

use App\SoftStore\System\Http\Interfaces\ServerRequestInterface;

class Request implements ServerRequestInterface
{
    public static function formatRequest()
    {
        return $_REQUEST;
    }
}