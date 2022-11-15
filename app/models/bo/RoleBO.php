<?php
    class RoleBO {
        private $roleDAO;
        public function __construct() {
            require_once 'app/models/dao/RoleDAO.php';
            $this -> roleDAO = new RoleDAO();
        }
        public function getById($id) {
            if (empty($id)) {
                return null;
            }
            return $this -> roleDAO -> getById($id);
        }
        public function getByName($name) {
            if (empty($name)) {
                return null;
            }
            return $this -> roleDAO -> getByName($name);
        }
    }
?>