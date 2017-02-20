<?php

class baseController{

    public function error()
    {
        include "app/views/error.php";
    }

    public function model($name){
        if(file_exists('app/models/'.$name.'.php')){
            include 'app/models/'.$name.'.php';

            return new $name();
        }else{
            echo $name.' model not found';
        }
    }

    public function view($page, $data=NULL, $data2= NULL, $data3=NULL, $data4 = NULL){

        if(file_exists("app/views/".$page.".php")){
            if($data != NULL){
                extract($data);
                if($data2 != NULL):
                    extract($data2);
                    if($data3 != NULL){
                        extract($data3);
                        if($data4 != NULL){
                            extract($data4);
                        }
                    }
                endif;
            }
            include "app/views/".$page.".php";
        }else{
            $this->error();
        }

    }
}
