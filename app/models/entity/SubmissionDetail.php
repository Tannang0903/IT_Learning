<?php
    class SubmissionDetail {
        private $submitID;
        private $testcaseID;
        private $time;
        private $state;

        public function setSubmitID($submitID) {
            $this -> submitID = $submitID;
        }
        public function setTestcaseID($testcaseID) {
            $this -> testcaseID = $testcaseID;
        }
        public function setTime($time) {
            $this -> time = $time;
        }
        public function setState($state) {
            $this -> state = $state;
        }

        public function getSubmitID() {
            return $this -> submitID;
        }
        public function getTestcaseID() {
            return $this -> testcaseID;
        }
        public function getTime() {
            return $this -> time;
        }
        public function getState() {
            return $this -> state;
        }
    }
?>