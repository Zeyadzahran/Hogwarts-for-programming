<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=FailedOnUserDashboard");
    exit();
}
$userId = $_SESSION["id"];
$username = $_SESSION["name"];
$charCount = strlen($username) + 8; // +8 accounts for "Welcome, "
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css">
    <title>Dashboard</title>
    <style>
        /* Add these styles to your existing CSS */
        .centered-dashboard {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);
            /* Adjust based on your navbar height */
            text-align: center;
        }

        .welcome-message {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #ffcc00;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
        }
    </style>
</head>

<body>
    <?php require "navPar.php"; ?>
    <div class="dashboard-container centered-dashboard">
        <h1 class="welcome-message">
            <span class="animated-username" style="--char-count: <?php echo $charCount; ?>;">
                <?php echo "Welcome,$username"; ?>
            </span>
        </h1>
    </div>
</body>

</html>