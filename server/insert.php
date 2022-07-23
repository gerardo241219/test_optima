<?php
    require_once './sql.php';

    if(isset($_POST['names']) && isset($_POST['age']) && isset($_POST['phone_number']) && isset($_POST['email']) && isset($_POST['model'])) {
        $names = $_POST['names'];
        $age = $_POST['age'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $model = $_POST['model'];

        $sql = new Sql();
        $query = $sql->insert($names, $age, $phone_number, $email, $model);
        $query->execute();

        $lastInsert = $sql->db_connect->lastInsertId();

        if($lastInsert > 0) {
            echo "Registro exitoso";
        } else {
            echo "Ocurrio un error al realizar el registro";
        }
    }