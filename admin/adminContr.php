<?php
require("adminClass.php");


if (!isset($_GET["id"])) {
    header("Location: ../manageUsers.php?error=FailedOnAdminProfile");
    exit();
}

$userId = $_GET["id"];
$obj = new admin();

if ($obj->updateRole($userId)) {
    header("Location: manageUsers.php?success=RoleUpdated!");
    exit();
} else {
    header("Location: manageUsers.php?errors=couldn'tUpdateUserRole");
    exit();
}

?>

