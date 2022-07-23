<?php

    require_once './sql.php';

    $car = isset($_POST['car']) ? $_POST['car'] : "";
    
    $sql = new Sql();
    $query = $sql->getModel($car);

    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);

    print_r(json_encode($result));
