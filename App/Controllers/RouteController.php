<?php

namespace App;

class RouteController
{
    public function home(): void
    {
        require_once dirname(__DIR__) . '/Views/user/home.php';
    }

    public function shop(): void
    {
        require_once dirname(__DIR__) . '/Views/user/shop.php';
    }

    public function orders(): void
    {
        require_once dirname(__DIR__) . '/Views/user/orders.php';
    }

    public function about(): void
    {
        require_once dirname(__DIR__) . '/Views/user/about.php';
    }

    public function contact(): void
    {
        require_once dirname(__DIR__) . '/Views/user/contact.php';
    }

    public function category(): void
    {
        require_once dirname(__DIR__) . '/Views/user/category.php';
    }
}