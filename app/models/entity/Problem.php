<?php
    class Problem {
        private $id;
        private $name;
        private $description;
        private $level;
        private $createdAt;
        private $updatedAt;
        private $authorID;
        private $totalSubmit;
        private $score;
        private $timeLimit;
        private $successSubmit;

        // Navigation property
        private $author;

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
        public function getStrLevel() {
            if ($this -> level == 1) {
                return 'Dễ';
            }else if ($this -> level == 2) {
                return 'Trung bình';
            }else return 'Khó';
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
        public function getScore() {
            return $this -> score;
        }
        public function getTimelimit() {
            return $this -> timeLimit;
        }
        public function getAuthor() {
            return $this -> author;
        }
        public function getTotalSubmit() {
            return $this -> totalSubmit;
        }
        public function getSuccessSubmit() {
            return $this -> successSubmit;
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
        public function setAuthor($author) {
            $this -> author = $author;
        }
        public function setScore($score) {
            $this -> score = $score;
        }
        public function setTimeLimit($timeLimit) {
            $this -> timeLimit = $timeLimit;
        }
        public function setTotalSubmit($totalSubmit) {
            $this -> totalSubmit = $totalSubmit;
        }
        public function setSuccessSubmit($successSubmit) {
            $this -> successSubmit = $successSubmit;
        }
    }
?>