<?php
    class User {
        private $id;
        private $username;
        private $password;
        private $email;
        private $gender;
        private $roleID;
        private $createdAt;
        private $updatedAt;

        public function setID($id) {
            $this -> id = $id;
        }
        public function setUsername($username) {
            $this -> username = $username;
        }
        public function setPassword($password) {
            $this -> password = $password;
        }
        public function setEmail($email) {
            $this -> email = $email;
        }
        public function setGender($gender) {
            $this -> gender = $gender;
        }
        public function setRoleID($roleID) {
            $this -> roleID = $roleID;
        }
        public function setCreatedAt($createdAt) {
            $this -> createdAt = $createdAt;
        }
        public function setUpdatedAt($updatedAt) {
            $this -> updatedAt = $updatedAt;
        }

        public function getID() {
            return $this -> id;
        }
        public function getUsername() {
            return $this -> username;
        }
        public function getPassword() {
            return $this -> password;
        }
        public function getEmail() {
            return $this -> email;
        }
        public function getGender() {
            return $this -> gender;
        }
        public function getRoleID() {
            return $this -> roleID;
        }
        public function getCreatedAt() {
            return $this -> createdAt;
        }
        public function getUpdatedAt() {
            return $this -> updatedAt;
        }
    }
?>