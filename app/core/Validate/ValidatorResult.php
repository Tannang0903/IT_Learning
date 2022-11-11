<?php
    class ValidatorResult {
        private $state;
        private $messages;

        public function __construct($state, $messages) {
            $this -> state = $state;
            $this -> messages = $messages;
        }

        public function setMessages($messages) {
            $this -> messages = $messages;
        }
        public function setState($state) {
            $this -> state = $state;
        }

        public function getState() {
            return $this -> state;
        }
        public function getMessage() {
            return $this -> messages;
        }

        public function isSuccess() {
            return $this -> state;
        }

        public function isFailure() {
            return !$this -> state;
        }
    }
?>