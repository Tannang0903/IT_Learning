<?php
    class Validator {
        private $rules;
        public function __construct($rules) {
            $this -> rules = $rules;
        }
        public function validate() {
            $this -> rules = array_filter($this -> rules);

            if (!empty($this -> rules)) {
                foreach ($this -> rules as $field => $rule) {
                    $ruleItemArr = explode('|', $rule);
                    foreach ($ruleItemArr as $rules) {
                        $rulesArr = explode(':', $rules);
                        $ruleName = reset($rulesArr);
                        if (count($rulesArr) > 1) {
                            $ruleValue = end($rulesArr);
                        }
                    }
                }
            }
        }
    }
?>