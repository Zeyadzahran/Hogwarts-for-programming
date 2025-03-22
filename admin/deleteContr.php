<?php

require("adminClass.php");

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php?error=FailedToDeleteUser");
    exit();
}
$userId = $_SESSION["id"];
$obj = new admin();

    if ($obj->deleteUser($userId)) {
        header("Location: manageUsers.php?success=UserDeleted");
        exit();
    } else {
        header("Location: manageUsers.php?errors=couldn'tDeleteTheUser");
        exit();
    }

?>