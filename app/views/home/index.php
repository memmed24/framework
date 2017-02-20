<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
        <link rel="stylesheet" href="<?= baseurl ?>public/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?= baseurl ?>public/main.css">
        <link rel="stylesheet" href="<?= baseurl ?>public/style/navbar.css">
  </head>
  <body>
      <?php
      foreach ($menu as $menus):
      endforeach;
      $token = 'token'.md5('data'.date('i'));
      ?>

      <?php
        session_start();
          $user = array();
          if(isset($_SESSION['User_token'])){
              foreach ($users as $data){
                  if($data['user_token'] == $_SESSION['User_token']){
                      array_push($user, $data);
                  }
              }
          }
      ?>
        <header style="background-color: cyan; height: 250px;">

        
        </header>
        <!--<?php
        // if(isset($_SESSION['User_token'])){
        //     include_once 'navbar.php';
        // }
        ?>-->

        <!--<header>
            <div class="container">
                <div class="row">
                    <?php

                        if(!isset($_SESSION['User_token'])){ ?>
                            <div class="col-md-7">
                                <p class="icon_logo">Memo's Realm</p>
                            </div>
                            <div class="col-md-5">
                                <form method="post" action="<?php echo baseurl ?>signin/">
                                    <ul class="login">
                                        <li>
                                            <input type="text" name="email" class="" placeholder="Email">
                                        </li>
                                        <li>
                                            <input type="hidden" name="login" value="true">
                                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                                            <input type="password" name="pass" class="" placeholder="Password">
                                        </li>
                                        <li>
                                            <input type="submit" name="submit" class="button" value="Log In">
                                        </li>
                                    </ul>
                                </form>

                            </div>
                        <?php }

                    ?>
                </div>
        </header>-->

        <!--<section id="registration">
            <div class="container">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <form action="">
                            <ul>
                                <li>
                                    <input type="email" class="form-control" placeholder="Email">
                                </li>
                                <li>
                                    <input type="password" class="form-control" placeholder="Password">
                                </li>
                                <li>
                                    <input type="password" class="form-control" placeholder="Confirm Password">
                                </li>
                                <li>
                                    <input type="text" class="form-control" placeholder="Name">
                                </li>
                                <li>
                                    <input type="text" class="form-control" placeholder="Surname">
                                </li>
                                <li>
                                    <input type="text" class="form-control" placeholder="Set Username!">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>-->
      <?php


      $fortest = array();

      if($menus['place'] == "header"):
          echo "<ul class='nav-bar'>";

          foreach ($lists as $list){
                if($list['parent_id'] == 0){
                    echo "<li> <a href='".$list['link']."'>".$list['title']."</a> </li>";
                }
          }
          echo "</ul>";
      endif;
      ?>
    <footer>

    </footer>
      <ul>
    <?php

    if($menus['place'] == "footer"):
        echo "<ul class='nav-bar'>";
            foreach ($lists as $list){
                echo "<li> <a class='menu' href='".$list['link']."'>".$list['title']."</a> </li>";

            }
        echo "</ul>";
    endif;

    ?>


      </ul>

      <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
  </body>
</html>
