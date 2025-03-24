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

    <div class="userbk">
        <div class="dashboard-container">
            <h1>Welcome,<span class="animated-username" style="--char-count: <?php echo $charCount; ?>;"><?php echo $username; ?></span></h1>

        </div>
    </div>
    <?php require "sidePanal.php" ?>

</body>


</html>