<?php
$rootDir = dirname(dirname(__DIR__));
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id"])) {
    header("Location: /login?error=notloggedin");
    exit();
}

$userId = $_SESSION["id"];
$username = $_SESSION["name"];
$role = $_SESSION["role"];
$charCount = strlen($username);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/style.css">
    <title>Dashboard</title>
    <style>
        .centered-dashboard {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);
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

    <?php require_once $rootDir . "/admin/navPar.php"; ?>
    <div class="dashboard-container centered-dashboard">
        <h1 class="welcome-message">
            <span class="animated-username" style="--char-count: <?= $charCount + 8 ?>;">
                <?= "Welcome,$username" ?>
            </span>
        </h1>
    </div>
</body>

</html>