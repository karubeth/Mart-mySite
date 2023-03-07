<?php
class Auth{
    protected $username;
    protected $password;
    protected $actions;
    protected $role;
    
    function __construct()
    {
       if(isset($_SESSION['username'])){
           $this->username = $_SESSION['username'];
       } 
       if(isset($_SESSION['password'])){
           $this->username = $_SESSION['password'];
       } 
       if(isset($_SESSION['actions'])){
           $this->username = $_SESSION['role'];
       } 
       if(isset($_SESSION['username'])){
           $this->username = $_SESSION['role'];
       } 
    }
    public function isUserLoggedIn(){
        if(strlen($this->username>0)){
            return true;
        }
        return false;
    }
}