<?php
    class ProblemVM {
        private $id;
        private $name;
        private $description;
        private $level;
        private $createdAt;
        private $updatedAt;

        public function getId() {
            return $this -> id;
        }
        public function getName() {
            return $this -> name;
        }
        public function getDescription() {
            return $this -> description;
        }
        public function getLevel() {
            return $this -> level;
        }
        public function getCreatedAt() {
            return $this -> createdAt;
        }
        public function getUpdatedAt() {
            return $this -> updatedAt;
        }
        public function getAuthorID() {
            return $this -> authorID;
        }

        public function setId($id) {
            $this -> id = $id;
        }
        public function setName($name) {
            $this -> name = $name;
        }
        public function setDescription($description) {
            $this -> description = $description;
        }
        public function setLevel($level) {
            $this -> level = $level;
        }
        public function setCreatedAt($createdAt) {
            $this -> createdAt = $createdAt;
        }
        public function setUpdatedAt($updatedAt) {
            $this -> updatedAt = $updatedAt;
        }
        public function setAuthorId($authorID) {
            $this -> authorID = $authorID;
        }
    }
?>