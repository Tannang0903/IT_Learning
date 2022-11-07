<?php
    class AuthController extends BaseController {
        public function __construct()
        {
            require 'app/models/bo/UserBO.php';
            parent::__construct();
            $this -> userBO = new UserBO();
        }
        public function login() {
            if ($this -> isAuthenticated()) {
                $this -> response -> redirect('home/index');
            }else {
                if ($this -> request -> isGet()) {
                    $this -> render('Auth/login');
                }else if ($this -> request -> isPost()) {
                    $user = $this -> userBO -> login($this -> request -> getBody('username'), $this -> request -> getBody('password'));
                    if ($user != null) {
                        print_r($user);
                        $claims = [
                            new Claims('ID', $user -> getID()),
                            new Claims('Role', 'Admin'),
                            new Claims('Username', $user -> getUsername())
                        ];
                        $this -> signIn($claims);
                    }
                    $this -> response -> redirect('home/index');
                }
            }
        }
    }
?>