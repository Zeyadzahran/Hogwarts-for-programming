<?php

require("adminClass.php");


    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: ../login.php?error=Can'tManegeUser!");
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
    <link rel="stylesheet" href="style.css">
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
                        foreach($users as $user):
                        echo "<tr>
                            <td>{$user['id']}</td>
                            <td>{$user['name']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['wand_name']}</td>
                            <td>{$user['house_name']}</td>"
                ?>
                <td>
                    <div text-align="center">
                        <a href="deleteContr.php " class="delete">Delete</a>
                        <a href="adminContr.php " class="setadmin">Set Admin</a>
                    </div>
                </td>
                <?php 
                    echo "</tr>";
                        endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "sidePanal.php";?>

</body>
</html>
