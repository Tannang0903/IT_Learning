<?php
    class Homecontroller extends BaseController{
        public $model;
        public function __construct()
        {
            $this -> model = $this -> model('HomeModel');
        }
        public function index() {
            echo $this -> model -> data;
        }

        public function detail($id = '', $slug = '') {
            $this -> data['title'] = 'Hello From Ron';
            echo $id;
            $this -> render('Home/index', $this -> data);
        }
    }
?>