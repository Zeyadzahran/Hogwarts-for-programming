<?php


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $rePassword = $_POST["rePassword"];
    $email = $_POST["email"];

    
    require_once "../classes/signup-contr.classes.php";
    require_once "../classes/signup.classes.php";

    // Initialize the SignupContr object
    $signup = new SignupContr($username, $password, $rePassword, $email);

    // Validate and register the user

    $signup->validateUser();

    header("Location: ../src/login.php");
    exit();


}
?>