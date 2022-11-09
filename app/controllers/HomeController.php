<?php
    class Homecontroller extends BaseController{
        private $problemBO;
        public function __construct()
        {
            require_once "app/models/bo/ProblemBO.php";
            $this -> problemBO = new ProblemBO();
        }
        public function index() {
            $data['problems'] = $this -> problemBO -> getAllWithAuthor();
            $this -> render('Home/index', 'Trang chủ', $data);
        }

        public function detail($id = '', $slug = '') {
            $this -> data['title'] = 'Hello From Ron';
            $this -> render('Home/index', $this -> data);
        }
    }
?>