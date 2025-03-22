<?php

require("adminClass.php");


if (!isset($_GET["id"])) {
    header("Location: ../src/login.php?error=FailedToDeleteUser");
    exit();
}
$userId = $_GET["id"];
$obj = new admin();

    if ($obj->deleteUser($userId)) {
        header("Location: manageUsers.php?success=UserDeleted");
        exit();
    } else {
        header("Location: manageUsers.php?errors=couldn'tDeleteTheUser");
        exit();
    }

?>