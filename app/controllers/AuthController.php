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

        public function logout() {
            if ($this -> isAuthenticated()) {
                $this -> signOut();
                $this -> response -> redirect('home');
            }
        }
        public function register() {
            $this -> render('Auth/register', 'Đăng kí');
        }
        public function reset() {
            $this -> render('Auth/reset', 'Khôi phục mật khẩu');
        }
    }
?>