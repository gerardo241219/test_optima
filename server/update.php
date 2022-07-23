<?php

    require_once './sql.php';

    if(isset($_POST['names']) && isset($_POST['age']) && isset($_POST['phone_number']) && isset($_POST['email']) && isset($_POST['model']) && isset($_POST['register'])) {
        $names = $_POST['names'];
        $age = $_POST['age'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $model = $_POST['model'];
        $register = $_POST['register'];
        
        $sql = new Sql();
        $query = $sql->update($names, $age, $phone_number, $email, $model, $register);
        $query->execute();

        if($query->rowCount() > 0) {
            echo "correct";
        } else {
            echo "error";
        }
    }