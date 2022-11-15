<?php
    class Validator {
        private $messages;
        private $value;
        private $name;
        public function __construct($value, $name) {
            $this -> messages = [];
            $this -> value = $value;
            $this -> name = $name;
        }

        public function required() {
            if (is_array($this -> value)) {
                if (empty($this -> value) || count($this -> value) == 0) {
                    $this -> messages['required'] = $this -> name." không được để trống";
                }
            }else{
                if (empty(trim($this -> value))) {
                    $this -> messages['required'] = $this -> name." không được để trống";
                }
            }
            return $this;
        }

        public function maxLength($max) {
            if (is_array($this -> value)) {
                if (count($this -> value) > $max) {
                    $this -> messages['maxLength'] = "Độ dài tối thiểu của ".$this -> name." không được vượt quá $max";
                }
            }else{
                if (empty(trim($this -> value)) || strlen($this -> value) > $max) {
                    $this -> messages['maxLength'] = "Độ dài tối thiểu của ".$this -> name." không được vượt quá $max";
                }
            }
            return $this;
        }

        public function minLength($min) {
            if (is_array($this -> value)) {
                if (count($this -> value) < $min) {
                    $this -> messages['minLength'] = "Độ dài tối thiểu của ".$this -> name." không được bé hơn $min";
                }
            }else{
                if (empty(trim($this -> value)) || strlen($this -> value) < $min) {
                    $this -> messages['minLength'] = "Độ dài tối thiểu của ".$this -> name." không được bé hơn $min";
                }
            }
            return $this;
        }

        public function email() {
            if (!filter_var($this -> value, FILTER_VALIDATE_EMAIL)) {
                $this -> messages['email'] = $this -> name." không đúng định dạng email";
            }
            return $this;
        }

        public function number() {
            if (!is_numeric($this -> value)) {
                $this -> messages['number'] = $this -> name." không phải là số";
            }
            return $this;
        }

        public function date() {
            if ((bool)strtotime($this -> value) == false) {
                $this -> messages['date'] = $this -> name." không đúng định dạng ngày";
            }
            return $this;
        }

        public function validate() {
            require_once 'app/core/Validate/ValidatorResult.php';
            if (count($this -> messages) > 0 && !empty($this -> messages)) {
                return new ValidatorResult(false, $this -> messages);
            }else{
                return new ValidatorResult(true, []);
            }
        }
    }
?>