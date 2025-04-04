<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rePassword = $_POST["rePassword"];

    // Get the project root directory
    $rootDir = dirname(__DIR__);

    require_once $rootDir . "/classes/signup.classes.php";
    require_once $rootDir . "/classes/signup-contr.classes.php";

    // initialize object from class SignupContr
    $signup = new SignupContr($username, $email, $password, $rePassword);

    // validate & check for errors 
    $signup->validateUser();

    // Going back to front page
    header("location: /login");
}
