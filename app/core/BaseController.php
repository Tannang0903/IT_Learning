<?php
    require_once 'app/core/Request.php';
    require_once 'app/core/Response.php';
    require_once 'app/core/Claims.php';
    class BaseController {
        protected $request;
        protected $response;
        protected $user;
        public function __construct() {
            $this -> request = new Request();
            $this -> response = new Response();
        }
        protected function model($model) {
            if (file_exists("app/models/view-models/$model.php")) {
                require_once "app/models/view-models/$model.php";
                if (class_exists($model)) {
                    return new $model();
                }
            }
            return null;
        }

        protected function render($view, $title, $data = [], $layout = 'Layout') {
            if (isset($_SESSION['USER'])) {
                foreach ($_SESSION['USER'] as $claim) {
                    $data['user'][$claim -> getName()] = $claim -> getValue();
                }
            }
            extract($data);
            if (file_exists("app/views/Shared/$layout.php")) {
                require_once "app/views/Shared/$layout.php";
            }
        }

        protected function signIn($claims) {
            if (isset($_SESSION['USER'])) return false;
            $_SESSION['USER'] = $claims;
            return true; 
        }

        protected function signOut() {
            if (isset($_SESSION['USER'])) {
                unset($_SESSION['USER']);
                return true;
            }
            return false; 
        }

        protected function isAuthenticated() {
            return isset($_SESSION['USER']);
        }

        protected function getClaims($key) {
            foreach ($_SESSION['USER'] as $k => $v) {
                if ($k == $key) return $v;
            }
            return null;
        }

        protected function isInRole($role) {
            foreach ($_SESSION['USER'] as $claim) {
                if ($claim -> getName() == 'Role') {
                    if ($claim -> getValue() == $role) return true;
                    else return false;
                }
            }
            return false;
        }

        protected function image($filename) {
            return ROOT."/public/images/$filename";
        }

        protected function url($controller, $action, $id = null) {
            if ($id != null) {
                return ROOT."/index.php/$controller/$action/$id";
            }else{
                return ROOT."/index.php/$controller/$action";
            }
        }
    }
?>