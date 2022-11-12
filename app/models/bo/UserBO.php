<?php
    class UserBO {
        private $userDAO;
        private $roleDAO;
        public function __construct() {
            require_once 'app/models/dao/UserDAO.php';
            require_once 'app/models/dao/RoleDAO.php';
            require_once 'app/core/Validate/Validator.php';
            require_once 'app/core/Validate/ValidatorResult.php';
            $this -> userDAO = new UserDAO();
            $this -> roleDAO = new RoleDAO();
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
        public function reset($user){
            $entity = $this -> userDAO -> getByEmail($user -> getEmail);
            if($entity != null){
                $this -> userDAO -> resetPassword($user);
            }
        }
        public function getAll(){
            return $this -> userDAO -> fetchAll();
        }

        public function getById($id){
            if(empty($id)){
                return null;
            }else{
                return $this -> userDAO -> getById($id);
            }   
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
            if($entity != null){
                $this -> userDAO -> update($user);
            }
        }
        public function remove($id){
            $user = $this -> userDAO -> getById($id);
            if($user != null){
                $this -> userDAO -> remove($id);
            }
        }
    }
?>