<?php


$router

->add('/', 'App\RouteController:home')
->add('/shop', 'App\RouteController:shop')
->add('/orders', 'App\RouteController:orders')
->add('/about', 'App\RouteController:about')
->add('/contact', 'App\RouteController:contact')
->add('/category', 'App\RouteController:category')
->add('/views', 'App\RouteController:views')
->add('/card', 'App\RouteController:card')
->add('/search', 'App\RouteController:search')
->add('/wishlist', 'App\RouteController:wishlist')
->add('/checkout', 'App\RouteController:checkout');


    // ->add('post/{slug}', 'App\PostController:show')
    // ->add('user/', 'App\UserController:index')
    // ->add('user/{id}', 'App\UserController:show')
    // ->onError('App\ErrorController:index');

$router->run();
