<?php

class Loader{

    public function run(){

      if(isset($_GET['url'])){
          $url = $_GET['url'];
//          $url = explode('/', $url);
          $url=explode('/',filter_var(rtrim($url,"/'"),FILTER_SANITIZE_URL));
          $controller = $url[0];
          if(file_exists("app/controllers/".$controller.".php")){
              include "app/controllers/".$controller.".php";
              $method = @$url[1];
              $controller = new $url[0];
              if(method_exists($controller, $method)){
                  $controller->$method();
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
              require_once "app/controllers/home.php";
              $home = new Home();

              if(method_exists($home, $url[0])){
                  $home->profile($url[1]);
              }else{
                  $error = new baseController();
                  $error->error();
              }
          }
      }else{
          require_once "app/controllers/home.php";
          $home = new Home();

          $home->index();
      }

    }

}
