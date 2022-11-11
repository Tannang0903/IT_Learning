<?php
    require_once 'app/models/entity/Problem.php';
    class ProblemDAO extends BaseDAO {
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

        public function insert($problem) {
            return $this -> executeNonQuery("
                INSERT INTO PROBLEMS(ID, NAME, DESCRIPTION, CREATEDAT, UPDATEDAT, AUTHORID)
                VALUES('$problem -> getId()', '$problem -> getName()', '$problem -> getDescription()', '$problem -> getCreated()', '$problem -> getUpdatedAt()', '$problem -> getAuthorID()')
            ");
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