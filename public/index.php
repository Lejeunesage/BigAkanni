<?php

spl_autoload_register(function ($className) {
    require_once dirname(__DIR__) . '/App/Controllers/' . explode('\\', $className)[1] . '.php';
});

use App\Router;

$url = $_GET['url'] ?? '/';

$router = new Router($url);

#Ceci est le chemin vers le fichier qui contient toutes les routes du site
require_once dirname(__DIR__) . '/route/web.php';
