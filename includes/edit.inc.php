<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=FailedOnUserProfile");
    exit();
}

$id = $_SESSION["id"];

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $newpassword = $_POST["newpassword"];
    $repassword = $_POST["repassword"];
    $email = $_POST["email"];

    
    require_once "../classes/edit-contr.classes.php";
    require_once "../classes/editprofile.classes.php";

    // Initialize the EditContr object
    $edit = new EditContr($id, $username, $email, $password, $newpassword, $repassword);


    // Validate and Edit user

    $edit->validateUser();
    $user = $edit->getuser($id);
    if ($user["role"] === "Admin"){
        header("Location: ../admin/main/profile.php");
        exit();
    }
    else 
    {
        header("Location: ../user/main/profile.php");
        exit();
    }
}
?>