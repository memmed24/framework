<?php

class Home extends baseController{

    public function __construct(){

    }

    public function index(){
        $this->view('home/index');
    }

}
