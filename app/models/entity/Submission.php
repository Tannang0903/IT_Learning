<?php
    class Submission {
        private $id;
        private $code;
        private $language;
        private $state;
        private $createdAt;
        private $updatedAt;
        private $userId;

        public function getId() {
            return $this -> id;
        }
        public function getCode() {
            return $this -> code;
        }
        public function getLanguage() {
            return $this -> language;
        }
        public function getState() {
            return $this -> state;
        }
        public function getCreatedAt() {
            return $this -> createdAt;
        }
        public function getUpdatedAt() {
            return $this -> updatedAt;
        }
        public function getUserId() {
            return $this -> userId;
        }

        public function setId($id) {
            $this -> id = $id;
        }
        public function setCode($code) {
            $this -> code = $code;
        }
        public function setLanguage($language) {
            $this -> language = $language;
        }
        public function setState($state) {
            $this -> state = $state;
        }
        public function setCreatedAt($createdAt) {
            $this -> $createdAt = $createdAt;
        }
        public function setUpdatedAt($updatedAt) {
            $this -> updatedAt = $updatedAt;
        }
        public function setUserId($userId) {
            $this -> userId = $userId;
        }
    }
?>