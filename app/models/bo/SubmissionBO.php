<?php
    class SubmissionBO {
        private $problemDAO;
        private $testcaseDAO;
        private $submissionDAO;
        public function __construct() {
            require_once 'app/models/dao/ProblemDAO.php';
            require_once 'app/models/dao/TestcaseDAO.php';
            require_once 'app/models/dao/SubmissionDAO.php';
            $this -> problemDAO = new ProblemDAO();
            $this -> testcaseDAO = new TestcaseDAO();
            $this -> submissionDAO = new SubmissionDAO();
        }
        public function submit($code, $language, $problemId, $userId) {
            require_once 'app/core/CodeExecutor/Compiler/CompilerFactory.php';
            require_once 'app/core/CodeExecutor/Runner.php';
            require_once 'app/core/CodeExecutor/Models/SubmitState.php';
            $problem = $this -> problemDAO -> getById($problemId);
            if ($problem != null) {
                $runner = new Runner(CompilerFactory::getInstance($language));
                $submission = new Submission();
                $submission -> setId(uniqid());
                $submission -> setCode($code);
                $submission -> setLanguage($language);
                $submission -> setState(SubmitState::Success);
                $submission -> setUserId($userId);
                $details = [];
                $testcases = $this -> testcaseDAO -> getTestcasesOfProblem($problemId);
                foreach ($testcases as $testcase) {
                    $submissionDetail = new SubmissionDetail();
                    $submissionDetail -> setSubmitID($submission -> getId());
                    $submissionDetail -> setTestcaseID($testcase -> getId());
                    $result = $runner -> execute($code, $testcase -> getInput());
                    if ($result -> getStatus() == ExecutorStatus::CompilerError) {
                        $submissionDetail -> setState(SubmitState::CompilerError);
                    }else if ($result -> getStatus() == ExecutorStatus::RuntimeError) {
                        $submissionDetail -> setState(SubmitState::RuntimeError);
                    }else{
                        if ($result -> getOutput() != $testcase -> getOutput()) {
                            $submissionDetail -> setState(SubmitState::WrongAnswer);
                        }else{
                            if ($result -> getTime() < $problem -> getTimeLimit()) {
                                $submissionDetail -> setState(SubmitState::TimeLimit);
                            }else{
                                $submissionDetail -> setState(SubmitState::Success); 
                            }
                        }
                    }
                    $submissionDetail -> setTime($result -> getTime());
                    array_push($details, $submissionDetail);
                }
                foreach ($details as $detail) {
                    if ($detail -> getState() != SubmitState::Success) {
                        $submission -> setState($detail -> getState());
                        break;
                    }
                }
                $result = $this -> submissionDAO -> submit($submission, $details);
                if ($result) {
                    return $submission;
                }else{
                    return null;
                }
            }
        }
    }
?>