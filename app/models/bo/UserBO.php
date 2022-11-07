<?php
    class UserBO {
        private $userDAO;
        public function __construct() {
            require 'app/models/dao/UserDAO.php';
            $this -> userDAO = new UserDAO();
        }

        public function login($username, $password) {
            if (!empty($username) && !empty($password)) {
                $user = $this -> userDAO -> login($username, $password);
                return $user;
            }
        }
    }
?>