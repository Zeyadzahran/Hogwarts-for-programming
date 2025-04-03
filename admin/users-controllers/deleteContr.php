<?php

require("../adminClass.php");


if (!isset($_GET["id"])) {
    header("Location: ../main/manageUsers.php?error=?error=FailedToDeleteUser");
    exit();
}
$userId = $_GET["id"];
$obj = new admin();

    if ($obj->deleteUser($userId)) {
        header("Location: ../main/manageUsers.php?success=UserDeleted");
        exit();
    } else {
        header("Location: ../main/manageUsers.php?errors=couldn'tDeleteTheUser");
        exit();
    }

?>