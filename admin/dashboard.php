<?php
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: ../login.php?error=FailedOnAdminDashboard");
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="dashboard-container">
        <h1>Welcome, <span class="animated-username" style="--char-count: <?php echo $charCount; ?>;"><?php echo $username; ?></span></h1>
    </div>
    <?php require "sidePanal.php";?>

</body>

</html>