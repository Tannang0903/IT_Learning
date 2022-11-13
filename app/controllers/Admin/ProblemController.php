<?php
    class ProblemController extends BaseController{
        private $problemBO;
        public function __construct()
        {
            parent::__construct();
            require_once 'app/models/bo/ProblemBO.php';
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
            $this -> render('Admin/Problem/insert','Thêm bài tập');
        }

        public function summitted() {
            $this -> render('Admin/Problem/summitted','Danh sách đã nộp');
        }
    }
?>