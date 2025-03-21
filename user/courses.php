<?php
require "userClass.php";

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../login.php?error=FailedOnCources");
    exit();
}

$userId = $_SESSION["id"];

$obj = new user();


$courses = $obj->getCourses($userId);


if (!$courses) {
    header("Location: ../login.php?error=UserNotFound");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleUser.css">
    <title>Courses</title>
</head>

<body>
    <div class="dashboard-container">
        <h2>My Courses</h2>
        <div class="dashboard-menu">

            <table class="user-table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Professor Name</th>
                        <th>Degree</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($course['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($course['professor_name']); ?></td>
                            <td><?php echo htmlspecialchars($course['degree']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php require "sidePanal.php" ?>

</body>

</html>