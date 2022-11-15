<?php
    class Homecontroller extends BaseController{
        private $problemBO;
        private $userBO;
        public function __construct()
        {
            require_once "app/models/bo/ProblemBO.php";
            require_once "app/models/bo/UserBO.php";
            $this -> problemBO = new ProblemBO();
            $this -> userBO = new UserBO();
        }
        public function index() {
            $data['problems'] = $this -> problemBO -> getAllWithAuthor();
            $data['rank'] = $this -> userBO -> getUserRank();
            if ($this -> isAuthenticated()) {
                $data['problem_count'] = $this -> problemBO -> count();
                $data['problem_solved'] = count($this -> problemBO -> getDoneProblemOfUser($this -> getClaims('ID')));
            }
            $this -> render('Home/index', 'Trang chủ', $data);
        }

        public function detail($id = '', $slug = '') {
            $this -> data['title'] = 'Hello From Ron';
            $this -> render('Home/index', $this -> data);
        }
    }
?>