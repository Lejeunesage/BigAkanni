<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>

    <h1>Post</h1>

    <?php

    if (isset($slug)) {
        echo 'Slug : ' . $slug;
        $baseURL = '/' . dirname(trim($_SERVER['REQUEST_URI'], '/'), 2);
    }
    else {
        $baseURL = '/' . dirname(trim($_SERVER['REQUEST_URI'], '/'));
    }

    require_once 'example-menu.php';

    ?>

</body>

</html>