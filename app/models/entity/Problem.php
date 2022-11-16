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

        public function __construct() {
            $this -> totalSubmit = 0;
            $this -> successSubmit = 0;
        }

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

        public function validate() {
            require_once 'app/core/Validate/Validator.php';
            $result = [];
            if (isset($this -> id)) {
                $validateId = new Validator($this -> id, 'ID');
                $validateId = $validateId -> required() -> minLength(6) -> validate();
                if ($validateId -> isFailure()) {
                    $result['ID'] = $validateId -> getMessage();
                }
            }
            if (isset($this -> name)) {
                $validateName = new Validator($this -> name, 'Name');
                $validateName = $validateName -> required() -> minLength(6) -> validate();
                if ($validateName -> isFailure()) {
                    $result['Name'] = $validateName -> getMessage();
                }
            }
            if (isset($this -> description)) {
                $validateDescription = new Validator($this -> description, 'Description');
                $validateDescription = $validateDescription -> required() -> minLength(15) -> validate();
                if ($validateDescription -> isFailure()) {
                    $result['Description'] = $validateDescription -> getMessage();
                }
            }
            if (isset($this -> score)) {
                $validateScore = new Validator($this -> score, 'Score');
                $validateScore = $validateScore -> number() -> minValue(0) -> validate();
                if ($validateScore -> isFailure()) {
                    $result['Score'] = $validateScore -> getMessage();
                }
            }
            if (isset($this -> timeLimit)) {
                $validateTimeLimit = new Validator($this -> timeLimit, 'Time Limit');     
                $validateTimeLimit = $validateTimeLimit -> number() -> minValue(0) -> validate();
                if ($validateTimeLimit -> isFailure()) {
                    $result['TimeLimit'] = $validateTimeLimit -> getMessage();
                }
            }
            if (isset($this -> author)) {
                $validateAuthor = new Validator($this -> authorID, 'Author');    
                $validateAuthor = $validateAuthor -> required() -> validate();
                if ($validateAuthor -> isFailure()) {
                    $result['Author'] = $validateAuthor -> getMessage();
                }
            }
            if (isset($this -> level)) {
                $validateLevel = new Validator($this -> level, 'Level');
                $validateLevel = $validateLevel -> number() -> validate();
                if ($validateLevel -> isFailure()) {
                    $result['Level'] = $validateLevel -> getMessage();
                }
            }
            if (count($result) > 0) {
                return new ValidatorResult(false, $result);
            }else{
                return new ValidatorResult(true, null);
            }
        }
    }
?>