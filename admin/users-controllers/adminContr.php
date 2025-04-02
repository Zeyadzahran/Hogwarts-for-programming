<?php
require("../adminClass.php");


if (!isset($_GET["id"])) {
    header("Location: ../main/manageUsers.php?error=FailedOnAdminProfile");
    exit();
}

$userId = $_GET["id"];
$obj = new admin();

if ($obj->updateRole($userId)) {
    header("Location: ../main/manageUsers.php?success=RoleUpdated!");
    exit();
} else {
    header("Location: ../main/manageUsers.php?errors=couldn'tUpdateUserRole");
    exit();
}

?>

