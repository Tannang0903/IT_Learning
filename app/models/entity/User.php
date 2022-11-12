<?php
    class User {
        private $id;
        private $username;
        private $password;
        private $email;
        private $gender;
        private $roleID;
        private $avatar;
        private $score;
        private $birth;
        private $phone;
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
        public function setScore($score) {
            $this -> score = $score;
        }
        public function setBirth($birth) {
            $this -> birth = $birth;
        }
        public function setPhone($phone) {
            $this -> phone = $phone;
        }

        public function getAvatar() {
            return $this -> avatar;
        }
        public function getStrGender() {
            if ($this -> gender == 1) {
                return 'Male';
            }else{
                return 'Female';
            }
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
        public function setAvatar($avatar) {
            $this -> avatar = $avatar;
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
        public function getScore() {
            return $this -> score;
        }
        public function getBirth() {
            return $this -> birth;
        }
        public function getPhone() {
            return $this -> phone;
        }
    }
?>