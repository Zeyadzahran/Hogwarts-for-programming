<?php

require ("signup.classes.php");

// here we simulate the opreation of the data of the user 
// like checking if the username is correct bla bla bla 

class SignupContr extends Signup{
    
    private $username;
    private $password;
    private $rePassword;
    private $email;

    public function __construct($username,$password,$rePassword,$email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->rePassword =$rePassword;
        $this->email = $email;
        
    }


    // actully we don't need most of this cause we handle it with html
    //  but i just want to give this class any fucking job 

    public function validateUser(){
        if($this->emptyInput()){
            header("location: ../index.php ? error = emptyinput");
            exit();
        }
        if(!$this->isValiedUsername()){
            header("location: ../index.php ? error = username is not valied");
            exit();
        }
        if(!$this->isValiedEmail()){
            header("location: ../index.php ? error = email is not valied");
            exit();
        }
        if(!$this->isSamePassword()){
            header("location: ../index.php ? error = Plz write the same password");
            exit();
        }
        if($this->userExists()){
            header("location: ../index.php ? error = the user already Exists");
            exit();
        }
         $this->setUser($this->username,$this->password,$this->email);
    }

    private function emptyInput()
    {
        return empty($this->username || $this->password || $this->rePassword || $this->email) ;
    }
    
    private function isValiedUsername(){

        return (preg_match("/^[a-zA-Z0-9]*$/",$this->username)); 
    }

    private function isValiedEmail(){
        return filter_var($this->email,FILTER_VALIDATE_EMAIL);
    }

    private function isSamePassword(){
        return $this->rePassword === $this->password;
    }

    private function userExists(){
        
        return $this->checkUser($this->username,$this->email) ;
    }
}