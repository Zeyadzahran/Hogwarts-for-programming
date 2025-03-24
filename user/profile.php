<?php
require "userClass.php";

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=FailedOnUserProfile");
    exit();
}

$userId = $_SESSION["id"];

$getUser = new user();
$userData = $getUser->getuser($userId);

if (!$userData) {
    header("Location: ../src/login.php?error=UserNotFound");
    exit();
}

$points = $getUser->getStudentPoints($userId);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css">
    <title>Profile</title>
</head>

<body>
    <div class="dashboard-container">
        <h2>My Profile</h2>
        <div class="profile-container">
            <div class="profile-card">
                <h2 class="user-name"><?php echo htmlspecialchars($userData['name']); ?></h2>
                <div class="user-info">
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
                    <p><strong>House:</strong> <?php echo htmlspecialchars($userData['house_name'] ?? "Not Assigned"); ?></p>
                    <p><strong>Wand:</strong> <?php echo htmlspecialchars($userData['wand_name'] ?? "Not Assigned"); ?></p>
                    <p><strong>Total Points:</strong> <?php echo htmlspecialchars($points['totalMark'] ?? 0); ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php require "sidePanal.php" ?>
</body>

</html>