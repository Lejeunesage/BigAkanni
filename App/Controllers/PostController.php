<?php

namespace App;

class PostController
{
    public function index(): void
    {
        require_once dirname(__DIR__) . '/view/post.php';
    }

    public function show($params): void
    {
        $slug = $params[1];
        require_once dirname(__DIR__) . '/view/post.php';
    }
}
