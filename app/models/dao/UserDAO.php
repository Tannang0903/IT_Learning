<?php
    require 'app/models/entity/User.php';
    class UserDAO extends BaseDAO {
        public function fetchAll() {
            return $this -> executeReader("SELECT * FROM USERS");
        }
        public function getById($id) {
            $entity = $this -> executeReader("SELECT * FROM USERS WHERE ID = '$id'");
            return $this -> map($entity);
        }

        public function getByUsername($username) {
            return $this -> map($this -> executeReader("SELECT * FROM USERS WHERE USERNAME = '$username'"));
        }
        public function getByEmail($email) {
            return $this -> map($this -> executeReader("SELECT * FROM USERS WHERE EMAIL = '$email'"));
        }
        public function login($username, $password) {
            $entity = $this -> executeReader("SELECT * FROM USERS WHERE (USERNAME = '$username' OR EMAIL = '$username') AND PASSWORD = '$password'");
            return $this -> map($entity);
        }

        public function register($user) {
            $this -> executeNonQuery("
                INSERT INTO USERS(USER_ID, USERNAME, EMAIL, PASSWORD, ROLEID)
                VALUES('".$user -> getID()."', '".$user -> getUsername()."', '".$user -> getEmail()."','".$user -> getPassword()."', '".$user -> getRoleID()."')
            ");
        }

        public function remove($id) {
            return $this -> executeNonQuery("DELETE FROM USERS WHERE ID = '$id'");
        }

        public function map($entity) {
            if ($entity == null) return null;
            $user = new User();
            $user -> setID($entity['USER_ID']);
            $user -> setUsername($entity['USERNAME']);
            $user -> setPassword($entity['PASSWORD']);
            $user -> setEmail($entity['EMAIL']);
            $user -> setGender($entity['GENDER']);
            $user -> setRoleID($entity['ROLEID']);
            $user -> setCreatedAt($entity['CREATEDAT']);
            $user -> setCreatedAt($entity['UPDATEDAT']);
            return $user;
        }
    }
?>