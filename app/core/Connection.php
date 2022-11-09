<?php
    class Connection {
        public static function getConnection() {
            global $config;
            $connection = new mysqli($config['database']['host'], $config['database']['username'],  $config['database']['password']) or die('Connection failure');

            // Check connection
            if ($connection -> connect_error) {
                die("Connection failed: " . $connection->connect_error);
                return null;
            }
            mysqli_select_db($connection, $config['database']['db']);
            return $connection;
        }
    }
?>