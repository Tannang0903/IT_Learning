<?php
    class UserController extends BaseController {
        private $userBO;
        public function __construct()
        {
            parent::__construct();
        }
        public function index() {
            $this -> response -> redirect('Profile/index');
        }
    }
?>