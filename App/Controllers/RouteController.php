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

    public function views(): void
    {
        require_once dirname(__DIR__) . '/Views/user/view_page.php';
    }

    public function card(): void
    {
        require_once dirname(__DIR__) . '/Views/user/card.php';
    }

    public function search(): void
    {
        require_once dirname(__DIR__) . '/Views/user/search_page.php';
    }

    public function wishlist(): void
    {
        require_once dirname(__DIR__) . '/Views/user/wishlist.php';
    }

    public function checkout(): void
    {
        require_once dirname(__DIR__) . '/Views/user/checkout.php';
    }

    public function logout(): void
    {
        require_once dirname(__DIR__) . '/Views/user/logout.php';
    }

    
    public function login(): void
    {
        require_once dirname(__DIR__) . '/Views/user/login.php';
    }
    
    public function register(): void
    {
        require_once dirname(__DIR__) . '/Views/user/register.php';
    }

    public function user_profile_update(): void
    {
        require_once dirname(__DIR__) . '/Views/user/user_profile_update.php';
    }

    public function admin(): void
    {
        require_once dirname(__DIR__) . '/Views/admin/admin_page.php';
    }

    public function admin_orders(): void
    {
        require_once dirname(__DIR__) . '/Views/admin/admin_orders.php';
    }

    public function admin_contacts(): void
    {
        require_once dirname(__DIR__) . '/Views/admin/admin_contacts.php';
    }

    public function admin_update_profile(): void
    {
        require_once dirname(__DIR__) . '/Views/admin/admin_update_profile.php';
    }

    public function admin_users(): void
    {
        require_once dirname(__DIR__) . '/Views/admin/admin_users.php';
    }

    public function admin_update_product(): void
    {
        require_once dirname(__DIR__) . '/Views/admin/admin_update_product.php';
    }

    public function admin_products(): void
    {
        require_once dirname(__DIR__) . '/Views/admin/admin_products.php';
    }
}