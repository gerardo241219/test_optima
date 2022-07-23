<?php

    class Connection
    {

        private $db_host;
        private $db_user;
        private $db_pass;
        private $db_name;

        function __construct()
        {
            $this->db_host = "localhost";
            $this->db_user = "root";
            $this->db_pass = "";
            $this->db_name = "bd_test_optima";
        }

        function connect()
        {
            try {
                $connection = 'mysql:host=' . $this->db_host . ';dbname=' . $this-> db_name;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $pdo = new PDO($connection, $this -> db_user, $this -> db_pass, $options);
                
                return $pdo; 
            } catch (PDOException $ex) {
                echo "Error " . $ex->getMessage();
            }
        }
    }