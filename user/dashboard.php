<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=FailedOnUserDashboard");
    exit();
}
$userId = $_SESSION["id"];
$username = $_SESSION["name"];
$charCount = strlen($username);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="dashboard-container">
        <h1><span class="animated-username" style="--char-count: <?php echo $charCount+8; ?>;"><?php echo "Welcome,$username"; ?></span></h1>

    </div>
    <?php require "sidePanal.php" ?>
    
</body>
    
    
</html>