<?php
session_start();
include "config/init.php";
include "includes/functions/alert.php";

class admin{
    private $username;
    private $password;

    private $connection;
    private $alert;
    public function __construct()
    {
        $this->connection=new init();
        $this->alert=new alert();
    }
    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }



    public function adminLogin(){
        $username=$this->getUsername();
        $password=$this->getPassword();
    
        if($username="" || $password==""){
            $this->alert->alert_danger("Please fill the username and password");
        }
        else{
            if($username="admin" && $password=="admin"){
                $_SESSION['username']= "admin";
                
                echo "<script type='text/javascript'>  window.location='dashboardadmin.php'; </script>";
             }
             else if($username="admin" && $password!="admin"){
                $this->alert->alert_danger("Invalid password");
             }
             else{
                $this->alert->alert_danger("Invalid username or password");
             }
        }
       
        
       


    }



}
?>