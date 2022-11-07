<?php
    class Request {
        private $method;
        public function __construct() {
            $this -> method = $_SERVER['REQUEST_METHOD'];
        }

        public function getMethod() {
            return $this -> method;
        }

        public function isGet() {
            return $this -> getMethod() == 'GET';
        }

        public function isPost() {
            return $this -> getMethod() == 'POST';
        }

        public function getQueryString($str) {
            if ($this -> isGet()) {
                if (isset($_GET[$str])) {
                    return $_GET[$str];
                }
            }
            return null;
        }

        public function getBody($str) {
            if ($this -> isPost()) {
                if (isset($_POST[$str])) {
                    return $_POST[$str];
                }
            }
            return null;
        }

    }
?>