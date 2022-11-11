<?php
    class HomeController extends BaseController{
        private $problemBO;
        public function __construct()
        {
            require_once "app/models/bo/ProblemBO.php";
            $this -> problemBO = new ProblemBO();
        }
        public function index() {
            $data['problems'] = $this -> problemBO -> getAllWithAuthor();
            $this -> render('Admin/Home/index', 'Trang chủ', $data);
        }
    }
?>