<?php
    class App {
        private $controller, $action, $params, $router;

        function __construct()
        {
            global $routes;
            $this -> controller = empty($routes['default_controller']) ? 'home' : $routes['default_controller'];
            $this -> action = 'index';
            $this -> params = [];
            $this -> router = new Route();
            $this -> handleUrl();
        }

        function getUrl() {
            return empty($_SERVER['PATH_INFO']) ? '' : $_SERVER['PATH_INFO']; 
        }

        public function handleUrl() {
            $url = $this -> getUrl();
            $url = $this -> router -> handleRoute($url);
            $urlArr = array_values(array_filter(explode('/', $url)));
            
            // Xử lí controller
            if (!empty($urlArr[0])) {
                $this -> controller = ucfirst($urlArr[0])."Controller";
                unset($urlArr[0]);
            }

            if (file_exists("app/controllers/".$this -> controller.".php")) {
                require_once "controllers/".$this -> controller.".php";
                if (class_exists($this -> controller)) {
                    $this -> controller = new $this -> controller();
                }else{
                    $this -> loadError();
                }
            }else{
                $this -> loadError();
            }

            // Xử lí action
            if (!empty($urlArr[1])) {
                $this -> action = $urlArr[1];
                unset($urlArr[1]);
            }

            // Xử lí params
            $this -> params = array_values($urlArr);

            if (method_exists($this -> controller, $this -> action)) {
                call_user_func_array([$this -> controller, $this -> action], $this -> params);                 
            }else{
                $this -> loadError();
            }
        }

        public function loadError($name = '404') {
            require_once 'errors/'.$name.'.php';
        }
    }
?>