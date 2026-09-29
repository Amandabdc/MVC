<?php

require_once __DIR__ .'/../app/controller/HomeController.php';
require_once __DIR__ .'/../app/controller/errors/HttpErrorController.php';
require_once __DIR__ .'/../app/controller/NoticiasController.php';

class Router {

    public function dispatch($url)
    {

        $parts = $url ? explode('/', $url) : [];

        $controllerName = $parts[0] ?? 'Home';
        $controllerName = ucfirst($controllerName) . 'Controller';
        
        $actionName = $parts[1] ?? 'index';

        
        $controller = new $controllerName();

        if(!class_exists($controllerName)){
            $controller = new HttpErrorController();
            $actionName = 'NotFound';
            return;
        }

        
        if(!method_exists($controller, $actionName)){
            $controller = new HttpErrorController();
            $actionName = 'NotFound';
            return;
        }

       $parametros = array_slice($parts, 2);

        call_user_func_array([$controller, $actionName], $parametros);
    }
}