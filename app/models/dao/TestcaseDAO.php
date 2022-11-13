<?php
    require_once 'app/models/entity/Testcase.php';
    class TestcaseDAO extends BaseDAO {
        public function getTestcasesOfProblem($problemId) {
            $result = $this -> executeReaderArray("SELECT TESTCASES.* FROM TESTCASES INNER JOIN PROBLEMS ON PROBLEMS.PROBLEM_ID = TESTCASES.PROBLEMID WHERE PROBLEM_ID = '$problemId'");
            $data = [];
            foreach ($result as $entity) {
                array_push($data, $this -> map($entity));
            }
            return $data;
        }
        public function map($entity) {
            if ($entity == null) return null;
            $testcase = new Testcase();
            $testcase -> setId($entity['TESTCASE_ID']);
            $testcase -> setInput($entity['INPUT']);
            $testcase -> setOutput($entity['OUTPUT']);
            $testcase -> setCreatedAt($entity['CREATEDAT']);
            $testcase -> setUpdatedAt($entity['UPDATEDAT']);
            $testcase -> setProblemId($entity['PROBLEMID']);
            return $testcase;
        }
    }
?>