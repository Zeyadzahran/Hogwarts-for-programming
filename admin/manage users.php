<?php
require("..\classes\dbh.classes.php");

class Data extends dbh{
    public function getData() {
        $conn = $this->connect();
        return $conn;
    }
}

$data = new Data();
$stmt = $data->getData()->query("SELECT 
                                    User.id, 
                                    User.name, 
                                    User.email, 
                                    Wand.name AS wand_name, 
                                    House.name AS house_name
                                FROM User
                                JOIN Wand ON User.wand_id = Wand.id
                                LEFT JOIN House ON User.house_id = House.id
                                WHERE User.role = 'Student';
    ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">
    <h2>Users Data!</h2>
    <div class="dashboard-menu">

        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Wand</th>
                    <th>House</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)):
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['wand_name']}</td>
                            <td>{$row['house_name']}</td>"
                ?>
                <td>
                    <div text-align="center">
                        <a href="delete.php?id=<?= $row['id'] ?>" class="delete">Delete</a>
                        <a href="setadmin.php?id=<?= $row['id'] ?>" class="setadmin">Set Admin</a>
                    </div>
                </td>
                <?php 
                    echo "</tr>";
                    endwhile;
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
