<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace model;

class User{
    private $id;
    private $username;
    private $password;
    private $email;
    
    function __construct($arg) {
        $this->username = $arg['username'];
        $this->password = $arg['password'];
    }
    
    /*
    *   La methode userExists n'a pas été testée avec le SPDO
    *
    /*
    public function userExists(){
        $bind = array(
            'username'=>  $this->username,
            'password'=>  $this->password
        );
        $db = \model\SPDO::getInstance();
        $sth = $db->query('SELECT * FROM user WHERE username = :username AND password = :password', $bind);
        $this->id = $sth['id'];
        $this->email = $sth['email'];
        if(isset($sth['id']) && isset($sth['username']) && isset($sth['password']) && isset($sth['email'])){
            return true;
        }else{
            return false;
        }
    }    
    
    //getters and setters
    
    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

}
