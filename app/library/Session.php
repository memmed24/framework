<?php

class Session{

    public function __construct(){
        session_start();
    }

    public function setSession($name, $value){
        $_SESSION[$name] = $value;
    }

    public function getSession($name){
        return $_SESSION[$name];
    }

    public function deleteSession($name){
        unset($_SESSION[$name]);
        return true;
    }

    public function hasSession($name){
        if(isset($_SESSION[$name])){
            return true;
        }else{
            return false;
        }
    }

    public function getSessionPath(){
        return session_save_path();
    }
}
