<?php

require_once("signup.classes.php");

// here we simulate the opreation of the data of the user 
// like checking if the username is correct bla bla bla 

class SignupContr extends Signup
{

    private $username;
    private $password;
    private $rePassword;
    private $email;

    public function __construct($username, $email, $password, $rePassword)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->rePassword = $rePassword;
    }


    // actully we don't need most of this cause we handle it with html
    //  but i just want to give this class any fucking job 

    public function validateUser()
    {
        if ($this->emptyInput()) {
            header("location: /register?error=emptyinput");
            exit();
        }
        if (!$this->isValiedUsername()) {
            header("location: /register?error=invalidusername");
            exit();
        }
        if (!$this->isValiedEmail()) {
            header("location: /register?error=invalidemail");
            exit();
        }
        if (!$this->isSamePassword()) {
            header("location: /register?error=passwordmismatch");
            exit();
        }
        if ($this->userExists()) {
            header("Location: /register?error=userexists");
            exit();
        }
        $this->setUser($this->username, $this->email, $this->password);
    }

    private function emptyInput()
    {
        return empty($this->username) || empty($this->password) || empty($this->rePassword) || empty($this->email);
    }

    private function isValiedUsername()
    {

        return (preg_match("/^[a-zA-Z0-9\s]*$/", $this->username));
    }

    private function isValiedEmail()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function isSamePassword()
    {
        return $this->rePassword === $this->password;
    }

    private function userExists()
    {

        return $this->checkUser($this->username, $this->email);
    }
}
