<?php

    require_once './sql.php';

    $register = isset($_POST['register']) ? $_POST['register'] : "";

    $sql = new Sql();
    $query = $sql->delete($register);
    $query->execute();

    if($query->rowCount() > 0) {
        echo "Se elimino el registro correctamente";
    }