<?php
    require_once 'app/core/Connection.php';
    abstract class BaseDAO {
        // For select
        public function executeReader($queryString) {
            $connection = Connection::getConnection();
            $result = $connection -> query($queryString);
            $connection -> close();
            if ($result -> num_rows == 0) return null;
            if ($result -> num_rows == 1) {
                return mysqli_fetch_assoc($result);
            }else{
                $data = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($data, $row);
                }
                return $data;
            }
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