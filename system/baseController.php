<?php

class baseController{

    public function error()
    {
        include "app/views/error.php";
    }

    public function view($page, $data=NULL){

        if(file_exists("app/views/".$page.".php")){
            if($data != NULL){
                extract($data);
            }
            include "app/views/".$page.".php";
        }else{
            $this->error();
        }

    }
}
