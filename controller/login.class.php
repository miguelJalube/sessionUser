<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;
class Login{ 

    private static $instance = null;
    private $userData;
    
    private function __construct($arg){
        $this->userData = $arg;
    }
    
    public static function getInstance($arg = null){
        if(is_null(self::$instance)){
            self::$instance = new Login($arg);
        }
        return self::$instance;
    }
    
    public function initSession(){
        if (session_status() !== PHP_SESSION_ACTIVE){
            session_start();
            $result = $this->sessionVars();
        }else{
            $result = false;
        }
        return $result;
    }
    
    public function sessionClose(){
        $result = session_destroy();
        return $result;
    }
    
    private function sessionVars(){
        if($this->check()){
            $_SESSION['username'] = $this->userData['username'];
            $_SESSION['password'] = $this->userData['password'];
            $_SESSION['email'] = $this->userData['email'];
            $_SESSION['id'] = $this->userData['id'];
            return true;
        }else{
            return false;
        }
    }
    
    private function check(){
        $user = new \model\User($this->userData);
        if($user->userExists()){
            $this->userData['email'] = $user->getEmail();
            $this->userData['id'] = $user->getId();
            return true;
        }
    }

    public function getUserData() {
        return $this->userData;
    }
}