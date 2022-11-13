<?php
    class Testcase {
        private $id;
        private $input;
        private $output;
        private $createdAt;
        private $updatedAt;
        private $problemId;

        public function setId($id) {
            $this -> id = $id;
        }
        public function setInput($input) {
            $this -> input = $input;
        }
        public function setOutput($output) {
            $this -> output = $output;
        }
        public function setCreatedAt($createdAt) {
            $this -> createdAt = $createdAt;
        }
        public function setUpdatedAt($updatedAt) {
            $this -> updatedAt = $updatedAt;
        }
        public function setProblemId($problemId) {
            $this -> problemId = $problemId;
        }

        public function getId() {
            return $this -> id;
        }
        public function getInput() {
            return $this -> input;
        }
        public function getOutput() {
            return $this -> output;
        }
        public function getCreatedAt() {
            return $this -> createdAt;
        }
        public function getUpdatedAt() {
            return $this -> updatedAt;
        }
        public function getProblemId() {
            return $this -> problemId;
        }
    }
?>