<?php

namespace App\SoftStore\System\Controller;

use App\SoftStore\System\DI\DependencyInjection;

abstract class AbstractController
{
    private $view;
    private $config;

    private function getTemplateDefault()
    {
        $this->config = include __DIR__.'/../../config/autoload/template.default.php';
        return $this->config['location'];
    }

    /**
     * @param string $view
     * @param array $data
     * @param bool $template
     * @return mixed
     */
    public function render(string $view, array $data = [], bool $template = true)
    {
        $this->view = $view;
        extract($data);
        if ($template && file_exists($this->getTemplateDefault())) {
            return include $this->getTemplateDefault();
        }

        return DependencyInjection::pageNotFound();
    }

    /**
     * @return mixed
     */
    public function content()
    {
        return include __DIR__."/../../templates/".$this->view.".phtml";
    }
}