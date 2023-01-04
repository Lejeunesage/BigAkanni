<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>

    <h1>User</h1>

    <?php

    if (isset($id)) {
        echo 'Id : ' . $id;
        $baseURL = '/' . dirname(trim($_SERVER['REQUEST_URI'], '/'), 2);
    }
    else {
        $baseURL = '/' . dirname(trim($_SERVER['REQUEST_URI'], '/'));
    }

    require_once 'example-menu.php';

    ?>

</body>

</html>