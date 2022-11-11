<?php
    require 'app/models/dao/RoleDAO.php';
    class RoleBO {
        private $roleDAO;
        public function __construct() {
            $this -> roleDAO = new RoleDAO();
        }
        public function getByName($name) {
            if (empty($name)) {
                return null;
            }
            return $this -> roleDAO -> getByName($name);
        }
    }
?>