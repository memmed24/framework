<?php

class Home extends baseController{

    public $admindb;
    private $user;
    public $pagedb;

    public function __construct(){
        $this->admindb = $this->model("adminm");
        $this->pagedb = $this->model("pagemodel");
        $this->user = $this->model("usermodel");
    }

    public function index(){
        $data['lists'] = $this->admindb->selectAll("list");
        $data2['menu'] = $this->admindb->selectAll("menu");
        $header['header'] = $this->pagedb->selectAll("header");
        // $datas['users'] = $this->user->allUser('users');
        $this->view("home/index", $data, $data2, $header);
    }

    public function page($page){
        $data = $this->pagedb->findPage("pages",$page);
        if($data){
            foreach ($data as $datas){

            }
            $header['header'] = $this->pagedb->selectAll("header");
            $posts['text'] = $this->pagedb->postget('post', $datas['id']);
            $this->view("page", $data, $posts, $header);
        }else{
            $this->error();
        }

//        $this->view("templates/header", $header);
    }
    // public function profile($username){
    //     session_start();


    //     $datas['users'] = $this->user->findUserByUsername('users', $username);
    //     foreach ($datas as $data);
    //     if(isset($_SESSION['User_token']) && isset($_SESSION['User_email'])){
    //         if($_SESSION['User_token'] == $data[0]['user_token'] && $_SESSION['User_email'] == $data[0]['user_email']){

    //             $this->view('home/profile', $datas);
    //         }else{
    //             header("Location: ".baseurl."");
    //         }

    //     }else{
    //         header("Location: ".baseurl." ");
    //     }
    // }
}
