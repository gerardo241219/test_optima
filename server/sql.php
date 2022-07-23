<?php

    require_once './connection.php';

    class Sql
    {

        private $db;
        public $db_connect;

        function __construct()
        {
            $this->db = new Connection();
            $this->db_connect = $this->db->connect();
        }

        public function update($names, $age, $phone_number, $email, $model, $register)
        {
            $sql = $this->db_connect->prepare("UPDATE tb_register SET names = :names, age = :age, phone_number = :phone_number, email = :email, id_model = :id_model WHERE id_register = :id_register");
            $sql->bindParam(':names', $names, PDO::PARAM_STR, 25);
            $sql->bindParam(':age', $age, PDO::PARAM_STR, 25);
            $sql->bindParam(':phone_number', $phone_number, PDO::PARAM_STR, 25);
            $sql->bindParam(':email', $email, PDO::PARAM_STR, 25);
            $sql->bindParam(':id_model', $model, PDO::PARAM_INT);
            $sql->bindParam(':id_register', $register, PDO::PARAM_INT);
            
            return $sql;
        }

        public function insert($names, $age, $phone_number, $email, $model)
        {
            $sql = $this->db_connect->prepare("INSERT INTO tb_register (names, age, phone_number, email, id_model) VALUES (:names, :age, :phone_number, :email, :id_model)");
            $sql->bindParam(':names', $names, PDO::PARAM_STR, 25);
            $sql->bindParam(':age', $age, PDO::PARAM_STR, 25);
            $sql->bindParam(':phone_number', $phone_number, PDO::PARAM_STR, 25);
            $sql->bindParam(':email', $email, PDO::PARAM_STR, 25);
            $sql->bindParam(':id_model', $model, PDO::PARAM_INT);

            return $sql;
        }

        public function delete($register) {
            $sql = $this->db_connect->prepare("DELETE FROM tb_register WHERE id_register = :id_register");
            $sql->bindParam(':id_register', $register, PDO::PARAM_INT);

            return $sql;
        }

        public function getModel($car)
        {
            $sql = $this->db_connect->prepare("SELECT * FROM tb_model WHERE id_car = :car");
            $sql->bindParam(':car', $car, PDO::PARAM_INT);

            return $sql;
        }
    }