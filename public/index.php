<?php

require_once __DIR__ . '/../core/Router.php';

$url = $_GET['url'] ?? trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if(empty($url)){
    $url = 'home/index';
}

$router = new Router();
$router->dispatch($url);