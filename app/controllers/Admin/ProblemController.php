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
            if ($this -> request -> isGet()) {
                $this -> render('Admin/Problem/insert','Thêm bài tập');
            }else{
                $problem = new Problem();
                $problem -> setId(uniqid());
                $problem -> setName($this -> request -> getBody('name'));
                $problem -> setDescription($this -> request -> getBody('description'));
                $problem -> setLevel($this -> request -> getBody('level'));
                $problem -> setScore($this -> request -> getBody('score'));
                $problem -> setAuthorId($this -> getClaims('ID'));
                $problem -> setTimeLimit($this -> request -> getBody('time'));
                $testcases = [];
                require_once 'app/models/entity/Testcase.php';
                if ($this -> request -> getBody('input') != null) {
                    for ($i = 0;$i < count($this -> request -> getBody('input'));$i++) {
                        $testcase = new Testcase();
                        $testcase -> setId(uniqid());
                        $testcase -> setInput($this -> request -> getBody('input')[$i]);
                        $testcase -> setOutput($this -> request -> getBody('output')[$i]);
                        $testcase -> setProblemId($problem -> getId());
                        array_push($testcases, $testcase);
                    }
                }
                $result = $this -> problemBO -> insert($problem, $testcases);
                if (is_array($result)) {
                    print_r($result);
                }else{
                    $this -> response -> redirect('admin/problem/index');
                }
            }
        }

        public function summitted() {
            $this -> render('Admin/Problem/summitted','Danh sách đã nộp');
        }
    }
?>