<?php
 session_start();
 $username = $_SESSION["name"];
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
    <h2>Welcome Mr. <?php echo $username ?></h2>
    <div class="dashboard-menu">
        <a href="manage users.php" class="dashboard-item">Manage Users</a>
        <a href="manage courses.php" class="dashboard-item">Manage Courses</a>
        <a href="houses.php" class="dashboard-item">Houses Leaderboard</a>
        <a href="logout.php" class="dashboard-item">Logout</a>
    </div>
</div>

</body>
</html>
