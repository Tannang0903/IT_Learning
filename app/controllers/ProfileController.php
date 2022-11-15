<?php
    class ProfileController extends BaseController {
        private $userBO;
        private $problemBO;
        public function __construct()
        {
            parent::__construct();
            require_once 'app/models/bo/UserBO.php';
            require_once 'app/models/bo/ProblemBO.php';
            $this -> userBO = new UserBO();
            $this -> problemBO = new ProblemBO();
        }

        public function index() {
            $data['me'] = $this -> userBO -> getById($this -> getClaims('ID'));
            $data['undoneProblems'] = $this -> problemBO -> getUndoneProblemOfUser($this -> getClaims('ID'));
            $data['doneProblems'] = $this -> problemBO -> getDoneProblemOfUser($this -> getClaims('ID'));
            $data['submitCount'] = $this -> userBO -> getSubmitCountOfUser($this -> getClaims('ID'));
            $data['successSubmitCount'] = $this -> userBO -> getSuccessSubmitCountOfUser($this -> getClaims('ID'));
            $this -> render('Profile/index', 'Thông tin cá nhân', $data);
        }
    }
?>