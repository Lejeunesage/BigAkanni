<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <h1>Home</h1>

    <?php
    
    $baseURL = '/' . trim($_SERVER['REQUEST_URI'], '/');

    require_once 'example-menu.php';
    
    ?>

</body>

</html>