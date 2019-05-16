<?php

namespace App\SoftStore\System\Controller;

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
     * @param string|null $template
     * @return mixed
     */
    public function render(string $view, array $data, string $template = null)
    {
        $this->view = $view;
        extract($data);
        if (!is_null($template) && file_exists($this->getTemplateDefault())) {
            include $this->getTemplateDefault();
        }
        return include __DIR__."/../../templates/".$view.".phtml";
    }
}