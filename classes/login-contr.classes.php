<?php

require ("login.classes.php");

class LoginContr extends Login {
    private $userinfo;
    private $password;
    
    public function __construct($userinfo, $password) {
        $this->userinfo = $userinfo;
        $this->password = $password;
    }
    public function loginUser() {
        if (empty($this->userinfo) || empty($this->password)) {
            header("location: /register?error=emptyInput");
            exit();
        }
        
        $this->getUser($this->userinfo, $this->password);
    }
    
    
}  
