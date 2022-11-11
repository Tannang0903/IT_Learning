<?php
    require_once 'app/models/entity/Role.php';
    class RoleDAO extends BaseDAO {
        public function getByName($name) {
            return $this -> map($this -> executeReader("SELECT * FROM ROLES WHERE NAME = '$name'"));
        }
        public function map($entity) {
            if ($entity == null) return null;
            $role = new Role();
            $role -> setId($entity['ROLE_ID']);
            $role -> setName($entity['NAME']);
            return $role;
        }
    }
?>