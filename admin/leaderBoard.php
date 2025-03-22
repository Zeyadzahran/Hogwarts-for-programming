<?php

require("adminClass.php");


$obj = new admin();
$houses = $obj->getHouses();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houses</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>

    <div class="dashboard-container">
        <h2>Houses Leaderboard!</h2>
        <div class="dashboard-menu">

            <table class="user-table">
                <thead>
                    <tr>
                        <th>ٌRank</th>
                        <th>Name</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($houses as $house) {
                        echo "<tr>
                            <td> $i </td>
                            <td>{$house['name']}</td>
                            <td>{$house['points']}</td>
                            </tr>";
                        $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require "sidePanal.php"; ?>




</body>

</html>