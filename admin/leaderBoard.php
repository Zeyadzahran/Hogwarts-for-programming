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
    <title>Houses Leaderboard</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>
    <?php require "navPar.php"; ?>
    <div class="main-content">
        <div class="leaderboard-container">
            <h1 class="leaderboard-title">Houses Leaderboard</h1>
            <div class="leaderboard-grid">
                <?php
                $rank = 1;
                foreach ($houses as $house) {
                    $rankClass = '';
                    if ($rank == 1) $rankClass = 'rank-1';
                    if ($rank == 2) $rankClass = 'rank-2';
                    if ($rank == 3) $rankClass = 'rank-3';

                    echo '<div class="leaderboard-card ' . $rankClass . '">';
                    echo '<div class="rank-badge">' . $rank . '</div>';
                    echo '<div class="house-info">';
                    echo '<h3 class="house-name">' . htmlspecialchars($house['name']) . '</h3>';
                    echo '<p class="house-description">' . htmlspecialchars($house['description'] ?? 'Ancient wizarding house') . '</p>';
                    echo '</div>';
                    echo '<div class="points-badge">' . htmlspecialchars($house['points']) . ' pts</div>';
                    echo '</div>';

                    $rank++;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>