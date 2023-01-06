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
->add('/checkout', 'App\RouteController:checkout')
->add('/logout', 'App\RouteController:logout')
->add('/login', 'App\RouteController:login')
->add('/register', 'App\RouteController:register')
->add('/user_profile_update', 'App\RouteController:user_profile_update')
->add('/admin', 'App\RouteController:admin')
->add('/admin_orders', 'App\RouteController:admin_orders')
->add('/admin_contacts', 'App\RouteController:admin_contacts')
->add('/admin_update_profile', 'App\RouteController:admin_update_profile')
->add('/admin_users', 'App\RouteController:admin_users')
->add('/admin_update_product', 'App\RouteController:admin_update_product')
->add('/admin_products', 'App\RouteController:admin_products')
->add('/getting', 'App\RegisterController:getting')


;


    // ->add('post/{slug}', 'App\PostController:show')
    // ->add('user/', 'App\UserController:index')
    // ->add('user/{id}', 'App\UserController:show')
    // ->onError('App\ErrorController:index');

$router->run();
