<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login?error=FailedOnUserProfile");
    exit();
}

$rootDir = dirname(__DIR__);

$id = $_SESSION["id"];

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $newpassword = $_POST["newpassword"];
    $repassword = $_POST["repassword"];
    $email = $_POST["email"];

    
    require_once $rootDir . "/classes/edit-contr.classes.php";
    require_once $rootDir. "/classes/editprofile.classes.php";

    // Initialize the EditContr object
    $edit = new EditContr($id, $username, $email, $password, $newpassword, $repassword);


    // Validate and Edit user

    $edit->validateUser();
    $user = $edit->getuser($id);
    if ($user["role"] === "Admin"){
        header("Location: professor/profile");
        exit();
    }
    else 
    {
        header("Location: student/profile");
        exit();
    }
}
?>