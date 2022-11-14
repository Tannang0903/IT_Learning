<?php
    class ProblemController extends BaseController{
        private $problemBO;
        private $submissionBO;
        public function __construct()
        {
            parent::__construct();
            require_once 'app/models/bo/ProblemBO.php';
            require_once 'app/models/bo/SubmissionBO.php';
            $this -> problemBO = new ProblemBO();
            $this -> submissionBO = new SubmissionBO();
        }

        public function index($id) {
            if ($this -> request -> isGet()) {
                $data['problem'] = $this -> problemBO -> getSingleWithAuthor($id);
                $this -> render('Problem/index', 'Bài tập', $data);
            }
        }

        public function detail($id) {
            $data['problem'] = $this -> problemBO -> getAuthorOfProblem($id);
            print_r($data);
        }

        public function insert() {
            $nameValidator = new Validator('Ro', 'Name');
            $data['error']['name'] = $nameValidator -> required() -> minLength(3) -> validate();
        }

        public function list() {
            $data['problems'] = $this -> problemBO -> getAllWithAuthor();
            $this -> render('Problem/list','Danh sách bài tập', $data);
        }

        public function submit($id) {
            $problem = $this -> problemBO -> getById($id);
            if ($problem != null) {
                $result = $this -> submissionBO -> submit($this -> request -> getBody('code'), $this -> request -> getBody('lang'), $id, $this -> getClaims('ID'));
                print_r($result);
            }else{

            }
        }
    }
?>