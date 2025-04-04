<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Get the project root directory
    $rootDir = dirname(__DIR__);

    require_once $rootDir . "/classes/login-contr.classes.php";
    require_once $rootDir . "/classes/login.classes.php";

    // initialize object from class LoginContr
    $login = new LoginContr($username, $password);

    // validate & check for errors 
    $login->loginuser();
}
