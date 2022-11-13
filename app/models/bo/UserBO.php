<?php
    class UserBO {
        private $userDAO;
        private $roleDAO;
        private $submissionDAO;
        public function __construct() {
            require_once 'app/models/dao/UserDAO.php';
            require_once 'app/models/dao/RoleDAO.php';
            require_once 'app/models/dao/SubmissionDAO.php';
            require_once 'app/core/Validate/Validator.php';
            require_once 'app/core/Validate/ValidatorResult.php';
            $this -> userDAO = new UserDAO();
            $this -> roleDAO = new RoleDAO();
            $this -> submissionDAO = new SubmissionDAO();
        }

        public function getById($id) {
            return $this -> userDAO -> getById($id);
        }

        public function login($username, $password) {
            if (!empty($username) && !empty($password)) {
                $user = $this -> userDAO -> login($username, $password);
                return $user;
            }
        }

        public function register($user) {
            $validateUsername = new Validator($user -> getUsername(), 'Username');
            $validateEmail = new Validator($user -> getEmail(), 'Email');
            $validatePassword = new Validator($user -> getPassword(), 'Password');
            $validateUsername = $validateUsername -> required() -> minLength(6) -> validate();
            $validateEmail = $validateEmail -> required() -> email() -> validate();
            $validatePassword = $validatePassword -> required() -> minLength(6) -> validate();
            if ($validateUsername -> isSuccess() && $validateEmail -> isSuccess() && $validatePassword -> isSuccess()) {
                $error = [];
                if ($this -> userDAO -> getByUsername($user -> getUsername()) != null) {
                    $error['Username'] = ["Username đã tồn tại"];
                }
                if ($this -> userDAO -> getByEmail($user -> getEmail()) != null) {
                    $error['Email'] = ["Email đã tồn tại"];
                }
                if (count($error) > 0 && !empty($error)) return $error;
                $userRole = $this -> roleDAO -> getByName('User');
                $user -> setId(uniqid());
                $user -> setRoleID($userRole -> getId());
                $this -> userDAO -> register($user);
                return true;
            }else{
                return [
                    "Username" => $validateUsername -> getMessage(),
                    "Email" => $validateEmail -> getMessage(),
                    "Password" => $validatePassword -> getMessage()
                ];
            }
        }
        public function resetPassword($user){
            $entity = $this -> userDAO -> getByEmail($user -> getEmail);
            if($entity != null){
                $this -> userDAO -> resetPassword($user);
            }
        }
        public function getAll(){
            return $this -> userDAO -> fetchAll();
        }

        public function getByUserName($name){
            if(empty($name)){
                return null;
            }else{
                return $this -> userDAO ->getByUserName($name);
            }
        }
        public function update($user){
            $entity = $this -> userDAO -> getById($user -> getID());
            if($entity == null) return null;
            $errors = [];
            if (!empty($user -> getUsername())) {
                $validateUsername = new Validator($user -> getUsername(), 'Username');
                $validateUsername = $validateUsername -> required() -> minLength(6) -> validate();
                if ($validateUsername -> isFailure()) {
                    $errors['Username'] = $validateUsername -> getMessage();
                }
            }
            if (!empty($user -> getEmail())) {
                $validateEmail = new Validator($user -> getEmail(), 'Email');
                $validateEmail = $validateEmail -> required() -> email() -> validate();
                if ($validateEmail -> isFailure()) {
                    $errors['Email'] = $validateEmail -> getMessage();
                }
            }
            if (!empty($user -> getScore())) {
                $validateScore = new Validator($user -> getScore(), 'Score');
                $validateScore = $validateScore -> required() -> number() -> validate();
                if ($validateScore -> isFailure()) {
                    $errors['Score'] = $validateScore -> getMessage();
                }
            }
            if (!empty($user -> getAddress())) {
                $validateAddress = new Validator($user -> getAddress(), 'Address');
                $validateAddress = $validateAddress -> required() -> minLength(6) -> validate();
                if ($validateAddress -> isFailure()) {
                    $errors['Address'] = $validateAddress -> getMessage();
                }
            }
            if (!empty($user -> getPhone())) {
                $validatePhone = new Validator($user -> getPhone(), 'Phone');
                $validatePhone = $validatePhone -> required() -> validate();
                if ($validatePhone -> isFailure()) {
                    $errors['Phone'] = $validatePhone -> getMessage();
                }
            }
            if (!empty($user -> getSchool())) {
                $validateSchool = new Validator($user -> getSchool(), 'School');
                $validateSchool = $validateSchool -> required() -> validate();
                if ($validateSchool -> isFailure()) {
                    $errors['School'] = $validateSchool -> getMessage();
                }
            }
            if (!empty($user -> getAvatar())) {
                $validateAvatar = new Validator($user -> getAvatar(), 'Avatar');
                $validateAvatar = $validateAvatar -> required() -> validate();
                if ($validateAvatar -> isFailure()) {
                    $errors['Avatar'] = $validateAvatar -> getMessage();
                }
            }
            if (!empty($user -> getBirth())) {
                $validateBirth = new Validator($user -> getBirth(), 'Birth');
                $validateBirth = $validateBirth -> required() -> validate();
                if ($validateBirth -> isFailure()) {
                    $errors['Birth'] = $validateBirth -> getMessage();
                }
            }
            if (!empty($user -> getGender())) {
                $validateGender = new Validator($user -> getGender(), 'Gender');
                $validateGender = $validateGender -> required() -> validate();
                if ($validateGender -> isFailure()) {
                    $errors['Gender'] = $validateGender -> getMessage();
                }
            }
            if (!empty($errors) && count($errors) > 0) return $errors;
            $this -> userDAO -> update($user);
            return true;
        }

        public function getSubmitCountOfUser($userId) {
            return $this -> submissionDAO -> getSubmitCountOfUser($userId);
        }
        public function getSuccessSubmitCountOfUser($userId) {
            return $this -> submissionDAO -> getSubmitCountOfUser($userId, true);
        }
        public function remove($id){
            $user = $this -> userDAO -> getById($id);
            if($user != null){
                $this -> userDAO -> remove($id);
            }
        }
    }
?>