<?php
    require_once 'app/core/Connection.php';
    abstract class BaseDAO {
        // For select
        public function executeReader($queryString) {
            $connection = Connection::getConnection();
            $result = $connection -> query($queryString);
            $connection -> close();
            return mysqli_fetch_assoc($result);
        }

        // For insert/update/delete
        public function executeNonQuery($queryString) {
            $connection = Connection::getConnection();
            $result = $connection -> query($queryString);
            $connection -> close();
            return $result; // True or False
        }

        public abstract function map($entity);
    }
?>