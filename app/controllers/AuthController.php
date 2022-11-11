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
                    $this -> render('Auth/login', 'Đăng nhập');
                }else if ($this -> request -> isPost()) {
                    $user = $this -> userBO -> login($this -> request -> getBody('username'), $this -> request -> getBody('password'));
                    if ($user != null) {
                        $claims = [
                            new Claims('ID', $user -> getID()),
                            new Claims('Role', 'Admin'),
                            new Claims('Username', $user -> getUsername())
                        ];
                        $this -> signIn($claims);
                        $this -> response -> redirect('home/index');
                    }else{
                        $data['error'] = 'Tài khoản hoặc mật khẩu không chính xác';
                        $this -> render('Auth/login', 'Đăng nhập', $data);
                    }
                }
            }
        }

        public function register() {
            if ($this -> request -> isGet()) {
                $this -> render('Auth/register', 'Đăng kí');
            }else{
                $user = new User();
                $user -> setUsername($this -> request -> getBody('username'));
                $user -> setEmail($this -> request -> getBody('email'));
                $user -> setPassword($this -> request -> getBody('password'));
                $result = $this -> userBO -> register($user);
                if (is_array($result)) {
                    $data['error'] = $result;
                    $this -> render('Auth/register', 'Đăng kí', $data);
                }else{
                    $this -> response -> redirect('auth/login');
                }
            }
        }
        
        public function logout() {
            if ($this -> isAuthenticated()) {
                $this -> signOut();
                $this -> response -> redirect('home');
            }
        }
        public function reset() {
            $this -> render('Auth/reset', 'Khôi phục mật khẩu');
        }
    }
?>