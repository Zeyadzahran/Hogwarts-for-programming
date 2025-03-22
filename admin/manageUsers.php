<?php

require("adminClass.php");


session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=Can'tManegeUser!");
    exit();
}
$userId = $_SESSION["id"]; // we will not use it here but i think we must keep it if we will use it in other pages  

$obj = new admin();
$users = $obj->GetUsers();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>

    <div class="dashboard-container">
        <h2>Users Data!</h2>
        <div class="dashboard-menu">

            <table class="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Wand</th>
                        <th>House</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user):
                        echo "<tr>
            <td>" . htmlspecialchars($user['id']) . "</td>
            <td>" . htmlspecialchars($user['name']) . "</td>
            <td>" . htmlspecialchars($user['email']) . "</td>
            <td>" . htmlspecialchars($user['wand_name']) . "</td>
            <td>" . htmlspecialchars($user['house_name']) . "</td>";
                    ?>
                        <td>
                            <div text-align="center">
                                <a href="deleteContr.php?id=<?php echo $user['id']; ?>" class="delete">Delete</a>
                                <a href="adminContr.php?id=<?php echo $user['id']; ?>" class="setadmin">Set Admin</a>
                            </div>
                        </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>

            </table>
        </div>
    </div>

    <?php require "sidePanal.php"; ?>

</body>

</html>