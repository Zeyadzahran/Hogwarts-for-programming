<?php
require("adminClass.php");

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../manageUsers.php?error=FailedOnAdminProfile");
    exit();
}

$userId = $_SESSION["id"];
$obj = new admin();

if ($obj->$updateRole($userId)) {
    header("Location: manageUsers.php?success=RoleUpdated!");
    exit();
} else {
    header("Location: manageUsers.php?errors=couldn'tUpdateUserRole");
    exit();
}

?>

