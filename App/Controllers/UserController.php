<?php

namespace App;

class UserController
{
    public function index(): void
    {
        require_once dirname(__DIR__) . '/view/user.php';
    }

    public function show($params): void
    {
        $id = $params[1];
        require_once dirname(__DIR__) . '/view/user.php';
    }
}
