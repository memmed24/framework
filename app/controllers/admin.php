<?php

class Admin extends baseController
{
    private $admindb;

    public function __construct()
    {
        $this->admindb = $this->model("adminm");
    }

    public function check(){
        session_start();
        $info = array();
        $admins = $this->admindb->findAdmin('admin', $_SESSION['Email']);
//        print_r($admins);
        foreach ($admins as $admin){
            $info = $admin;
        }
        if(isset($_SESSION['Token'])){
            return true;
        }
        else{
            header('location: http://localhost/own_framework/login/');
        }
    }

    public function index(){

        if($this->check() == true){
            $data['header'] = $this->admindb->selectAll('header');
            $this->view('admin/admin', $data);
        }
    }
    //========================= PAGE CREATE ============================//
    public function createpage(){

        if($this->check() == true){
            if(isset($_POST['submit']))
            {
                $link = $_POST['link'];
                $header = htmlentities($_POST['header'], ENT_QUOTES);
                $this->admindb->insert("pages", array(
                    "linkname" => $link,
                    "header" => $header
                ))->get();
            }
            $this->view("admin/pagecreate");
        }

    }


    public function pagelist(){
        $data['pages'] = $this->admindb->selectAll("pages");
        $this->view("admin/pagelist", $data);
    }

    public function deletepage($id){

        if($this->check() == true){
            $this->admindb->remove('pages', $id);
            header("location: http://localhost/own_framework/admin/pagelist/");
        }

    }

    public function updatepage($id){

        if($this->check() == true){

            if(isset($_POST['submit'])){
                $header = $_POST['header'];
                $link = $_POST['link'];
                $this->admindb->update('pages', $id, array(
                    'linkname' => $link,
                    'header' => $header
                ));
            }

            $data['pages'] = $this->admindb->selectOne('pages', $id);

            $this->view('admin/pageupdate', $data);

        }

    }

    //========================== LIST ===================================//

    public function updatemenu($id){
        if($this->check() == true){
            if (isset($_POST['submit'])){
                $place = $_POST['place'];
                if($place != "empty"){
                    $this->admindb->updatemenu("menu", $id , array(
                        "place" => $place
                    ));
                }else{
                    $session = new Session();
                    $session->setSession("WrongVal", "Error");
                }
            }
            $data['menu'] = $this->admindb->selectAll("menu");
            $this->view("admin/menuplace", $data);
        }
    }

    public function listcreate(){
        if($this->check() == true){
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $link = $_POST['link'];
                $level = $_POST['levels'];
                $data['send'] = $this->admindb->insert("list", array(
                    "title" => $title,
                    "link" => $link,
                    "level" => $level,
                ))->get();

                $this->view("admin/menucreate");

            }
        }
    }



    public function listupdate($id){
        if($this->check() == true){
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $link = $_POST['link'];
                $this->admindb->update("list", $id,array(
                    "title" => $title,
                    "link" => $link
                ));
            }
            $data['update'] = $this->admindb->selectOne("list", $id);
            $this->view("admin/listupdatepage", $data);
        }
    }

    public function listdelete($id){
        if($this->check() == true){
            $this->admindb->remove("list", $id);
            header("location: http://localhost/own_framework/admin/alllist/");
        }
    }

    public function alllist(){
        if($this->check() == true){
            $data['lists'] = $this->admindb->selectAll("list");
            $menu['menus'] = $this->admindb->selectAll("menu");
            $this->view("admin/showlists", $data,$menu);
        }
    }

    public function menucreate(){
        if($this->check() == true){
            $this->view("admin/menucreate");
        }
    }



    // ================== ========== = = POST = = =========== =================  //


    public function postcreate(){
        if($this->check() == true){
            $page_id = @$_POST['page'];
            $text = @htmlentities($_POST['text'], ENT_QUOTES);


            $this->admindb->insert("post", array(

                "text" => $text,
                "pages_id" => $page_id

            ))->get();

            $data['pages'] = $this->admindb->selectAll('pages');
            $this->view("admin/post/postcreate", $data);
        }
    }



    // == // == // == // == // == // == // HEADER // == // == // == // == // == // == //


//    this function will detect that header will be color or image

    public function detect(){
        if($this->check() == true){
//            if(isset($_POST['submit'])){
                $detect = $_POST['img_or_color'];
                $this->admindb->update('header', 1 , array(
                    'img_or_color' => $detect
                ));
                header('location:http://localhost/own_framework/admin/');
//            }
        }
    }

    public function detectcolor(){
        if($this->check() == true){
//            if(isset($_POST['submit'])){
                $color = $_POST['color'];
                $this->admindb->update('header', 1, array(
                    'color' => $color
                ));
                header('location:http://localhost/own_framework/admin/');
//            }
        }
    }

    public function uploadpic(){
        if($this->check() ==  true){
            if(isset($_POST['image'])){

                $img_src = $_POST['image'];
                $files = $_FILES['file'];
                $files['name'] = "picture".rand(0,100000).".jpg";
                print_r($files['name']);
                $target_dir = "public/images/";
                $target_file = $target_dir.$files['name'];
                move_uploaded_file($files['tmp_name'], $target_file);


                $this->admindb->update("header",1,array(
                    "img_src" => $files['name']
                ));

                header('Location: http://localhost/own_framework/admin/');

            }
        }
    }


    public function detectheight(){
        if($this->check() == true){
            $height = $_POST['height'];
            if($height >= 150 && $height <= 350){
                $this->admindb->update('header', 1, array(
                    'height' => $height
                ));
            }
//            header('Location: http://localhost/own_framework/admin/');
        }
    }

    // == // == // == // == // == Admin create == // == // == // == // == // == //

    public function createadmin(){
        if($this->check() == true){
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $this->admindb->insert('admin', array(
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email,
                    'password' => password_hash($pass, PASSWORD_BCRYPT, [12])
                ))->get();
            }else{
              //  die("There's some problem with creating admin...");
            }
            $this->view('admin/createadmin');
//            $this->view('admin/createadmin');
        }
    }

}