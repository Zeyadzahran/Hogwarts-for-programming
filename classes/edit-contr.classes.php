<?php

require ("editprofile.classes.php");


class EditContr extends Edit{
    
    private $id;
    private $username;
    private $email;
    private $password;
    private $newpassword;
    private $repassword;
    
    public function __construct($id,$username,$email,$password,$newpassword,$repassword)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;   
        $this->password = $password;
        $this->newpassword = $newpassword;
        $this->repassword =$repassword;
    }

    public function UpdatePass(){
        if (empty($this->newpassword || $this->repassword)) return false;

        if ($this->newpassword !== $this->repassword) return false;
    
        $user = $this->getuser($this->id);
        if($this->newpassword === $user["password"])  return false;

        $this->updatepassword($this->id,$this->newpassword);
        return true;
    }
    
    
    public function validateUser(){
        if(!$this->userExists()){
            header("location: ../src/editprofile.php ? error = user not found");
            exit();
        }
        if($this->emptyInput()){
            header("location: ../src/editprofile.php ? error = emptyinput");
            exit();
        }
        if(!$this->isValiedUsername()){
            header("location: ../src/editprofile.php ? error = username is not valid");
            exit();
        }
        if(!$this->isValiedEmail()){
            header("location: ../src/editprofile.php ? error = email is not valid");
            exit();
        }
        if(!$this->isSamePassword()){
            header("location: ../src/editprofile.php ? error = wrong password");
            exit();
        }
        $this->UpdatePass();
    
        $this->updateUser($this->id,$this->username,$this->email);
    }
    
    private function emptyInput()
    {
        return empty($this->username || $this->password  || $this->email);
    }

    private function isValiedUsername(){
        return (preg_match("/^[a-zA-Z0-9\s]*$/", $this->username));
    }

    private function isValiedEmail(){
        return filter_var($this->email,FILTER_VALIDATE_EMAIL);
    }

    private function isSamePassword(){
        $user = $this->getuser($this->id);
        return $this->password === $user["password"];
    }

    private function userExists(){
        
        return $this->checkUser($this->id);
    }

    
}