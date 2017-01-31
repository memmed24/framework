<?php

class Loader{

    public function run(){

      if(isset($_GET['url'])){
          $url = $_GET['url'];
          $url = explode("/", $url);
          $controller = $url[0];

          if(file_exists("app/controllers/".$controller.".php")){
              include "app/controllers/".$controller.".php";
              $controller = new $url[0];
              $method = $url[1];
              if(method_exists($controller, $method)){
                  if(isset($url[2])){
                      if (isset($url[2])){
                          call_user_func(array($controller, $method), $url[2]);
                      }else{
                          call_user_func(array($controller, $method), $url[2]);
                      }
                  }
              }else{
                  $controller->index();
              }
          }else{
              $error = new baseController();
              $error->error();
          }
      }else{
          require_once "app/controllers/home.php";
          $home = new Home();
          $home->index();
      }

    }

}
