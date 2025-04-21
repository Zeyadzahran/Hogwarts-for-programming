<?php
    require("../adminClass.php");


    if (!isset($_GET["id"])) {
        header("Location: /professor/manageUsers?error=FailedOnAdminProfile");
        exit();
    }

    $userId = $_GET["id"];
    $obj = new admin();

    if ($obj->updateRole($userId)) {
        header("Location: /professor/manageUsers?success=RoleUpdated!");
        exit();
    } else {
        header("Location: /professor/manageUsers?errors=couldn'tUpdateUserRole");
        exit();
    }

?>

