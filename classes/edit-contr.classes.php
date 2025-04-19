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
            header("location: editProfile ? error = user_not_found");
            exit();
        }
        if($this->emptyInput()){
            header("location: editProfile ? error = emptyinput");
            exit();
        }
        if(!$this->isValiedUsername()){
            header("location: editProfile ? error = username_is_not_valid");
            exit();
        }
        if(!$this->isValiedEmail()){
            header("location: editProfile ? error = email_is_not_valid");
            exit();
        }
        if(!$this->isSamePassword()){
            header("location: editProfile?error=wrong_password");
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