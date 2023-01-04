# Routeur PHP

Ce routeur en PHP est fait pour fonctionner avec l'url rewriting.
Des fichiers supplémentaires sont fournis afin de l'essayer et de mieux comprendre son fonctionnement.

## Exemple d'utilisation

### Dans votre fichier .htaccess

```
RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```

### Dans votre fichier index.php

```php
$url = $_GET['url'] ?? '';

$router = new App\Router($url);

$router->add('/', 'App\HomeController:index')
    ->add('post/', 'App\PostController:index')
    ->add('post/{slug}', 'App\PostController:show')
    ->add('user/', 'App\UserController:index')
    ->add('user/{id}', 'App\UserController:show')
    ->onError('App\ErrorController:index');

$router->run();
```

## Important

* Le namespace doit être spécifié pour chaque classe.
* Les noms de la classe et de la méthode doivent être séparés par deux points.
* Les accolades indiquent les emplacements des paramètres à transmettre à la méthode souhaitée.
* Pour passer des variables GET, il est obligatoire d'échapper les signes "?" et "=" par un antislash "\\" dans l'url.

## À savoir

* Il n'est pas obligatoire d'appeler la méthode onError() de la classe si l'on ne souhaite pas personnaliser une page d'erreur 404.