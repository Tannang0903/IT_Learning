<?php
    class ProblemBO {
        private $problemDAO;
        private $userDAO;
        public function __construct() {
            require_once 'app/models/dao/ProblemDAO.php';
            require_once 'app/models/dao/UserDAO.php';
            $this -> userDAO = new UserDAO();
            $this -> problemDAO = new ProblemDAO();
        }
        public function getAll() {
            return $this -> problemDAO -> fetchAll();
        }
        public function getAllWithAuthor() {
            $problems = $this -> problemDAO -> getProblemsWithAuthor();
            foreach ($this -> problemDAO -> getSubmitCountOfProblem(true) as $detail) {
                for ($i = 0;$i < count($problems);$i++) {
                    if ($problems[$i] -> getId() == $detail['PROBLEM_ID']) {
                        $problems[$i] -> setSuccessSubmit($detail['SUBMIT_COUNT']);
                    }
                }
            }
            foreach ($this -> problemDAO -> getSubmitCountOfProblem() as $detail) {
                for ($i = 0;$i < count($problems);$i++) {
                    if ($problems[$i] -> getId() == $detail['PROBLEM_ID']) {
                        $problems[$i] -> setTotalSubmit($detail['SUBMIT_COUNT']);
                    }
                }
            }
            return $problems;
        }

        public function getById($id) {
            if (empty($id)) {
                return null;
            }else{
                return $this -> problemDAO -> getById($id);
            }
        }

        public function getSingleWithAuthor($id) {
            if (empty($id)) {
                return null;
            }else{
                return $this -> problemDAO -> getWithAuthorById($id);
            }
        }

        public function insert($problem) {
            $entity = $this -> problemDAO -> getById($problem -> getId());
            if ($entity != null) {
                return false;
            }else {
                $this -> problemDAO -> insert($problem);
                return true;
            }
        }

        public function remove($id) {
            $problem = $this -> problemDAO -> getById($id);
            if ($problem != null) {
                $this -> problemDAO -> remove($id);
            }
        }

        public function update($problem) {
            $entity = $this -> problemDAO -> getById($problem -> getId());
            if ($entity != null) {
                $this -> problemDAO -> update($problem);
            }
        }

        public function getAuthorOfProblem($id) {
            $problem = $this -> problemDAO -> getById($id);
            if ($problem == null) return null;
            return $this -> userDAO -> getById($problem -> getAuthorId());
        }

        public function getUndoneProblemOfUser($userId) {
            $problems = [];
            foreach ($this -> problemDAO -> getUndoneProblem($userId) as $problemId) {
                array_push($problems, $this -> problemDAO -> getById($problemId));
            }
            return $problems;
        }
        
    }
?>