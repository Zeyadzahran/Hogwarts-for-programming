<?php
session_start();
$userid = $_SESSION["id"];
require("..\classes\dbh.classes.php");

class Data extends dbh{
    public function getData() {
        $conn = $this->connect();
        return $conn;
    }
}

$data = new Data();
if ($userid == 1) {
    $stmt = $data->getData()->prepare("
        SELECT 
            Course.id AS id, 
            Course.name AS name, 
            User.name AS professor_name
        FROM Course
        JOIN User ON Course.professor_id = User.id
    ");
} else {
    $stmt = $data->getData()->prepare("
        SELECT 
            Course.id AS id, 
            Course.name AS name
        FROM Course
        WHERE Course.professor_id = ?
    ");
    $stmt->bindParam(1, $userid, PDO::PARAM_INT);
}

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">
    <h2>All Courses!</h2>
    <div class="dashboard-menu">

        <table class="user-table">
            <thead>
                <tr>
                    <?php
                    if ($userid == 1)
                    {
                        echo "<th>ID</th>
                             <th>Course Name</th>
                            <th>Professor</th>";
                    }
                    else 
                    {
                        echo "<th>ID</th>
                             <th>Course Name</th>
                            <th>Actions</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>


                <?php
                    if ($userid == 1)
                    {
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['professor_name']}</td>
                            </tr>";
                        }
                    }
                    else 
                    {
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)):
                            echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>";
                ?>
                <td>
                <div text-align="center">
                    <a href="addquiz.html" class="AddQuiz">Add Quiz</a>
                </div> 
                    </td>     
                </tr>
                <?php
                        endwhile;
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
