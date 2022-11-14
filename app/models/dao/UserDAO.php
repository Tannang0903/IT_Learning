<?php
    require 'app/models/entity/User.php';
    class UserDAO extends BaseDAO {
        public function fetchAll() {
            return $this -> executeReader("SELECT * FROM USERS");
        }
        public function getById($id) {
            $entity = $this -> executeReader("SELECT * FROM USERS WHERE USER_ID = '$id'");
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
                INSERT INTO USERS(USER_ID, USERNAME, EMAIL, SCORE, PASSWORD, ROLEID)
                VALUES('".$user -> getID()."', '".$user -> getUsername()."', '".$user -> getEmail()."', 0,'".$user -> getPassword()."', '".$user -> getRoleID()."')
            ");
        }
        public function resetPassword($user){
            $this -> executeNonQuery("
                UPDATE INTO USERS(PASSWORD) VALUES ('".$user -> getPassword()."') WHERE EMAIL = '$user -> getEmail()'");
        }
        public function update($user){
            $query = 'UPDATE USERS SET';
            if (!empty($user -> getUsername())) {
                $query .= " USERNAME = '".$user -> getUsername()."'";
            }
            if (!empty($user -> getEmail())) {
                $query .= " EMAIL = '".$user -> getEmail()."'";
            }
            if (!empty($user -> getGender())) {
                $query .= " GENDER = '".$user -> getGender()."'";
            }
            if (!empty($user -> getAvatar())) {
                $query .= "AVATAR = '".$user -> getAvatar()."'";
            }
            if (!empty($user -> getScore())) {
                $query .= "SCORE = '".$user -> getScore()."'";
            }
            if (!empty($user -> getBirth())) {
                $query .= "BIRTH = '".$user -> getBirth()."'";
            }
            if (!empty($user -> getAddress())) {
                $query .= "ADDRESS = '".$user -> getAddress()."'";
            }
            if (!empty($user -> getPhone())) {
                $query .= "PHONE = '".$user -> getPhone()."'";
            }
            if (!empty($user -> getSchool())) {
                $query .= "SCHOOL = '".$user -> getSchool()."'";
            }
            $this -> executeNonQuery("$query WHERE USER_ID = '".$user -> getId()."'");
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
            $user -> setScore($entity['SCORE']);
            $user -> setBirth($entity['BIRTH']);
            $user -> setPhone($entity['PHONE']);
            $user -> setSchool($entity['SCHOOL']);
            $user -> setAddress($entity['ADDRESS']);
            return $user;
        }
    }
?>