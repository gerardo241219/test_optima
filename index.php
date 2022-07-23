<?php

    include_once './views/templates/header.php';
    
    require_once './server/connection.php';
    $conn = new Connection();
    $db = $conn->connect();

    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    if ($url[0] == "") {
        include_once './views/home.php';
    } else if ($url[0] == "register") {
        include_once './views/register.php';
    } else {
        include_once './views/404.php';
    }

    include_once './views/templates/footer.php';
?>

   