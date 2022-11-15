<?php
    require_once 'app/models/entity/Problem.php';
    class ProblemDAO extends BaseDAO {
        public function count() {
            return $this -> executeScalar('SELECT COUNT(*) FROM PROBLEMS');
        }
        public function fetchAll() {
            $result = $this -> executeReaderArray('SELECT * FROM PROBLEMS');
            $data = [];
            foreach ($result as $entity) {
                array_push($data, $this -> map($entity));
            }
            return $data;
        }

        public function getProblemsWithAuthor() {
            $result = $this -> executeReaderArray('SELECT * FROM PROBLEMS INNER JOIN USERS ON PROBLEMS.AUTHORID = USERS.USER_ID');
            $data = [];
            foreach ($result as $entity) {
                array_push($data, $this -> map($entity));
            }
            return $data;
        }

        public function getSubmitCountOfProblem($state = null) {
            if ($state == null) {
                return $this -> executeReaderArray('CALL SP_GetSubmitCountOfProblem(-1)');
            }else if ($state == true) {
                return $this -> executeReaderArray('CALL SP_GetSubmitCountOfProblem(1)');
            }else {
                return $this -> executeReaderArray('CALL SP_GetSubmitCountOfProblem(0)'); 
            }
        }

        public function getById($id) {
            return $this -> map($this -> executeReader("SELECT * FROM PROBLEMS WHERE PROBLEM_ID = '$id'"));
        }

        public function getWithAuthorById($id) {
            return $this -> map($this -> executeReader("SELECT * FROM PROBLEMS INNER JOIN USERS ON PROBLEMS.AUTHORID = USERS.USER_ID WHERE PROBLEM_ID = '$id'"));
        }

        public function insert($problem, $testcases) {
            echo "
            INSERT INTO PROBLEMS(PROBLEM_ID, NAME, DESCRIPTION, SCORE, TIMELIMIT, LEVEL, CREATEDAT, AUTHORID)
            VALUES('".$problem -> getId()."', '".$problem -> getName()."', '".$problem -> getDescription()."', ".$problem -> getScore().", ".$problem -> getTimeLimit().", ".$problem -> getLevel().", '".date('Y-m-d H:i:s')."', '".$problem -> getAuthorID()."')
        ";
            $result = $this -> executeNonQuery("
                INSERT INTO PROBLEMS(PROBLEM_ID, NAME, DESCRIPTION, SCORE, TIMELIMIT, LEVEL, CREATEDAT, AUTHORID)
                VALUES('".$problem -> getId()."', '".$problem -> getName()."', '".$problem -> getDescription()."', ".$problem -> getScore().", ".$problem -> getTimeLimit().", ".$problem -> getLevel().", '".date('Y-m-d H:i:s')."', '".$problem -> getAuthorID()."')
            ");
            if (!$result) return false;
            foreach ($testcases as $testcase) {
                $this -> executeNonQuery("
                    INSERT INTO TESTCASES(TESTCASE_ID, INPUT, OUTPUT, CREATEDAT, PROBLEMID)
                    VALUES('".$testcase -> getId()."', '".$testcase -> getInput()."', '".$testcase -> getOutput()."', '".date('Y-m-d H:i:s')."', '".$problem -> getId()."');                        
                ");
            }
            return true;
        }

        public function remove($id) {
            return $this -> executeNonQuery("DELETE FROM PROBLEMS WHERE PROBLEM_ID = '$id'");
        }

        public function update($problem) {
            $this -> executeNonQuery("
                UPDATE PROBLEMS
                    SET NAME = '$problem -> getName()', DESCRIPTION = '$problem -> getDescription()', AUTHORID = '$problem -> getAuthorID()', UPDATEDAT = 'date(\"Y-m-d H:i:s\")'
                WHERE PROBLEM_ID = '$problem -> getId()' 
            ");
        }

        public function getSubmitOfProblems($id) {
            $result = $this -> executeReaderArray("SELECT * FROM V_ProblemSubmission WHERE ProblemID = '$id'");
            $data = [];
            foreach ($result as $row) {
                array_push($data, $row['SubmitID']);
            }
            return $data;
        }

        public function getSubmitProblemByState($userId, $state) {
            if ($state == true) {
                $result = $this -> executeReaderArray("
                    SELECT DISTINCT TESTCASES.PROBLEMID AS 'PROBLEM_ID' FROM USERS
                    INNER JOIN SUBMISSIONS
                    ON USERS.USER_ID = SUBMISSIONS.USERID
                    INNER JOIN SUBMITDETAILS
                    ON SUBMITDETAILS.SUBMITID = SUBMISSIONS.SUBMIT_ID
                    INNER JOIN TESTCASES
                    ON TESTCASES.TESTCASE_ID = SUBMITDETAILS.TESTCASESID
                    WHERE SUBMISSIONS.STATE = 1 AND USERS.USER_ID = '$userId'
                ");
            }else{
                $result = $this -> executeReaderArray("CALL SP_GetUnDoneProblems('$userId')");
            }
            $data = [];
            foreach ($result as $row) {
                array_push($data, $row['PROBLEM_ID']);
            }
            return $data;
        }

        public function map($entity) {
            if ($entity == null) return null;
            $problem = new Problem();
            $problem -> setId($entity['PROBLEM_ID']);
            $problem -> setName($entity['NAME']);
            $problem -> setDescription($entity['DESCRIPTION']);
            $problem -> setLevel($entity['LEVEL']);
            $problem -> setTimeLimit($entity['TIMELIMIT']);
            $problem -> setScore($entity['SCORE']);
            $problem -> setCreatedAt($entity['CREATEDAT']);
            $problem -> setUpdatedAt($entity['UPDATEDAT']);
            $problem -> setAuthorId($entity['AUTHORID']);

            $author = new User();
            
            $author -> setID(isset($entity['AUTHORID']) ? $entity['AUTHORID'] : '');
            $author -> setUsername(isset($entity['USERNAME']) ? $entity['USERNAME'] : '');
            $author -> setPassword(isset($entity['PASSWORD']) ? $entity['PASSWORD'] : '');
            $author -> setEmail(isset($entity['EMAIL']) ? $entity['EMAIL'] : '');
            $author -> setAvatar(isset($entity['AVATAR']) ? $entity['AVATAR'] : '');
            $author -> setGender(isset($entity['GENDER']) ? $entity['GENDER'] : '');
            $author -> setRoleID(isset($entity['ROLEID']) ? $entity['ROLEID'] : '');
            $author -> setCreatedAt(isset($entity['CREATEDAT']) ? $entity['CREATEDAT'] : '');
            $author -> setCreatedAt(isset($entity['UPDATEDAT']) ? $entity['UPDATEDAT'] : '');

            $problem -> setAuthor($author);
            return $problem;
        }
    }
?>