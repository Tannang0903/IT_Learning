<?php
    class ProblemBO {
        private $problemDAO;
        private $userBO;
        public function __construct() {
            require_once 'app/models/dao/ProblemDAO.php';
            require_once 'app/models/bo/UserBO.php';
            $this -> userBO = new UserBO();
            $this -> problemDAO = new ProblemDAO();
        }
        public function count() {
            return $this -> problemDAO -> count();
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

        public function insert($problem, $testcases) {
            require_once 'app/core/Validate/ValidatorResult.php';
            $problemValidate = $problem -> validate();
            if (count($testcases) > 0) {
                $testcasesValidate = [];
                foreach ($testcases as $testcase) {
                    $result = $testcase -> validate();
                    if ($result -> isFailure()) {
                        array_push($testcasesValidate, $result -> getMessage());
                    }
                }
                if ($problemValidate -> isSuccess() && count($testcasesValidate) == 0) {
                    $entity = $this -> problemDAO -> getById($problem -> getId());
                    if ($entity != null) {
                        return ['problem' => 'ID đã tồn tại'];
                    }else{
                        $this -> problemDAO -> insert($problem, $testcases);
                        return true;
                    }
                }else{
                    return [
                        'problem' => $problemValidate -> getMessage(),
                        'testcases' => $testcasesValidate
                    ];
                }
            }else{
                return ['testcases' => 'Số lượng testcase phải lớn hơn 0', 'problem' => $problemValidate -> getMessage()];
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
            return $this -> userBO -> getById($problem -> getAuthorId());
        }

        public function getUndoneProblemOfUser($userId) {
            $problems = [];
            foreach ($this -> problemDAO -> getSubmitProblemByState($userId, false) as $problemId) {
                array_push($problems, $this -> problemDAO -> getById($problemId));
            }
            return $problems;
        }

        public function getDoneProblemOfUser($userId) {
            $problems = [];
            foreach ($this -> problemDAO -> getSubmitProblemByState($userId, true) as $problemId) {
                array_push($problems, $this -> problemDAO -> getById($problemId));
            }
            return $problems;
        }
        
        public function isSolved($problemId, $userId) {
            foreach ($this -> problemDAO -> getSubmitProblemByState($userId, true) as $solvedProblemId) {
                if ($problemId == $solvedProblemId) return true;
            }
            return false;
        }
    }
