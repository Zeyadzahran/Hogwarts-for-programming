<?php

require("..\classes\dbh.classes.php");

class Data extends dbh{
    public function getData() {
        $conn = $this->connect();
        return $conn;
    }
}

$data = new Data();
$stmt = $data->getData()->query("SELECT name,points FROM house
                                 ORDER BY points,name ASC;");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houses</title>
    <link rel="stylesheet" href="style.css">
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
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<tr>
                            <td> $i </td>
                            <td>{$row['name']}</td>
                            <td>{$row['points']}</td>
                            </tr>";
                            $i++;
                        }
                ?>
            </tbody>
        </table>
    </div>
  </div>


  <div class="sidebar">
        <h2>Admin Panel</h2>
            <ul>
                <li><a href="admin dashboard.php">🏨 Dashboard</a></li>
                <li><a href="manage users.php">👥 Manage Users</a></li>
                <li><a href="manage courses.php">📚 Manage Courses</a></li>
                <li><a href="houses.php" class="dashboard-item">🏠Houses Leaderboard</a></li>
                <li><a href="logout.php" class="logout">🚪 Logout</a></li>
            </ul>
  </div>

</body>
</html>