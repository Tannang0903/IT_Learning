<?php
    class App {
        private $area, $controller, $action, $params, $router;

        function __construct()
        {
            global $routes;
            $this -> area = '';
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
            // print_r($urlArr);
            // Xử lí controller
            if (!empty($urlArr[0])) {
                if (strtolower($urlArr[0]) == 'admin') {
                    $this -> area = ucfirst('Admin');
                    $this -> controller = ucfirst($urlArr[1])."Controller";
                    unset($urlArr[1]);
                }else{
                    $this -> controller = ucfirst($urlArr[0])."Controller";
                }
                unset($urlArr[0]);
            }

            if (empty($this -> area)) {
                if (file_exists("app/controllers/".$this -> controller.".php")) {
                    require_once "app/controllers/".$this -> controller.".php";
                    if (class_exists($this -> controller)) {
                        $this -> controller = new $this -> controller();
                    }else{
                        $this -> loadError();
                    }
                }else{
                    $this -> loadError();
                }
            }else{
                if (file_exists("app/controllers/".$this -> area."/".$this -> controller.".php")) {
                    require_once "app/controllers/".$this -> area."/".$this -> controller.".php";
                    if (class_exists($this -> controller)) {
                        $this -> controller = new $this -> controller();
                    }else{
                        $this -> loadError();
                    }
                }else{
                    $this -> loadError();
                }
            }

            // Xử lí action
            if ((empty($this -> area) || !empty($urlArr[1])) || (!empty($this -> area) && !empty($urlArr[2]))) {
                $this -> action = empty($this -> area) ? $urlArr[1] : $urlArr[2];
                if (empty($this -> area)) {
                    unset($urlArr[1]);
                }else{
                    unset($urlArr[2]);
                }
            }

            global $configs;
            $url = strtolower((empty($this -> area) ? '' : $this -> area.'/').str_replace('Controller', '', get_class($this -> controller)).'/'.$this -> action);
            if (isset($configs['authorization'][$url])) {
                $auth = $configs['authorization'][$url];
                if ($auth == 'authenticated') {
                    if (!$this -> controller -> isAuthenticated()) {
                        $this -> loadError('unauthorized');
                    }
                }else{
                    if (!$this -> controller -> isInRole($auth)) {
                        $this -> loadError('unauthorized');
                    }
                }
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
            exit();
        }
    }
?>