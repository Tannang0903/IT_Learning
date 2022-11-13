<?php
    require_once 'app/models/entity/Submission.php';
    require_once 'app/models/entity/SubmissionDetail.php';
    class SubmissionDAO extends BaseDAO {
        public function getSubmitCountOfUser($userId, $state = null) {
            $query = "SELECT COUNT(*) FROM SUBMISSIONS WHERE USERID = '$userId'";
            if ($state != null) {
                if ($state) {
                    $query .= " AND STATE = '1'";
                }else{
                    $query .= " AND STATE != '1'";
                }
            }
            return $this -> executeScalar($query);
        }
        public function submit($submission, $details) {
            $query = "
                INSERT INTO SUBMISSIONS(SUBMIT_ID, CODE, LANGUAGE, STATE, CREATEDAT, USERID)
                VALUES('".$submission -> getId()."', '".$submission -> getCode()."', '".$submission -> getLanguage()."', '".$submission -> getState() -> value."', '".date('Y-m-d H:i:s')."', '".$submission -> getUserId()."')
            ";
            $result = $this -> executeNonQuery($query);
            if ($result) {
                foreach ($details as $detail) {
                    $query = "
                        INSERT INTO SUBMITDETAILS(SUBMITID, TESTCASESID, TIME, STATE)
                        VALUES('".$detail -> getSubmitId()."', '".$detail -> getTestcaseId()."', ".$detail -> getTime().", '".$detail -> getState() -> value."')
                    ";
                    $this -> executeNonQuery($query);
                }
                return true;
            }else{
                return false;
            }
        }
        public function map($entity) {
            if ($entity == null) return null;
            $submission = new Submission();
            $submission -> setId($entity['SUBMISSION_ID']);
            $submission -> setCode($entity['CODE']);
            $submission -> setLanguage($entity['LANGUAGE']);
            $submission -> setState($entity['STATE']);
            $submission -> setCreatedAt($entity['CREATEDAT']);
            $submission -> setUserId($entity['USERID']);
            return $entity;
        }
    }
?>