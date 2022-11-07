<?php
    class UserController extends BaseController {
        private $userDAO;
        public function __construct()
        {
            parent::__construct();
        }
        public function index() {
            $this -> response -> redirect('user/detail');
        }

        public function detail() {
            echo 'Detail';
        }
    }
?>