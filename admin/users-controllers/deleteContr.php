<?php

require("../adminClass.php");


if (!isset($_GET["id"])) {
    header("Location: /professor/manageUsers?error=?error=FailedToDeleteUser");
    exit();
}
$userId = $_GET["id"];
$obj = new admin();

    if ($obj->deleteUser($userId)) {
        header("Location: /professor/manageUsers?success=UserDeleted");
        exit();
    } else {
        header("Location: /professor/manageUsers?errors=couldn'tDeleteTheUser");
        exit();
    }

?>