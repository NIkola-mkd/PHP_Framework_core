<?php

namespace nikola\phpFramework;

use nikola\phpFramework\Application;
use nikola\phpFramework\middlewares\BaseMiddleware;

class Controller
{
    public $layout = 'main';
    protected array $middlewares = [];
    public string $action = '';


    public function setLayout($layout)
    {
        return $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}