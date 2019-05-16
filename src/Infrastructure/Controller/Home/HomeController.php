<?php

namespace App\SoftStore\Infrastructure\Controller\Home;

use App\SoftStore\System\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        return $this->render('home/index', [
            'version' => 'stable'
        ], true);
    }
}