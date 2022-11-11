<?php
    class ProblemController extends BaseController{
        private $problemBO;
        public function __construct()
        {
            parent::__construct();
            require_once 'app/models/bo/ProblemBO.php';
            require_once 'app/core/Validator.php';
            $this -> problemBO = new ProblemBO();
        }

        public function index() {
            $data['problems'] = $this -> problemBO -> getAll();
            $this -> render('Admin/Problem/index','Bài tập', $data);
        }

        public function detail($id) {
            $data['problem'] = $this -> problemBO -> getAuthorOfProblem($id);
            print_r($data);
        }

        public function insert() {
            $nameValidator = new Validator('Ro', 'Name');
            $data['error']['name'] = $nameValidator -> required() -> minLength(3) -> validate();
            $this -> render('Admin/Problem/insert','Thêm bài tập', $data);
        }

        public function summitted() {
            $nameValidator = new Validator('Ro', 'Name');
            $data['error']['name'] = $nameValidator -> required() -> minLength(3) -> validate();
            $this -> render('Admin/Problem/summitted','Danh sách đã nộp', $data);
        }
    }
?>