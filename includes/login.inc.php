<?php


if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    require_once "../classes/login-contr.classes.php";
    require_once "../classes/login.classes.php";
    
    // intilaize object from class signupcontr

    $login = new LoginContr($username,$password);

    // validate & chaeck for errors 
    $login->loginuser();

    
}
    



