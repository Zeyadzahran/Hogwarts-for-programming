<?php
require("adminClass.php");
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=FailedInMangeCoursePage");
    exit();
}

$userid = $_SESSION["id"];


$obj = new admin();
$courses = $obj->GetCourses($userid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>

    <div class="dashboard-container">
        <h2>All Courses!</h2>
        <div class="dashboard-menu">

            <table class="user-table">
                <thead>
                    <tr>
                        <?php
                        if ($userid == 1) {
                            echo "<th>ID</th>
                             <th>Course Name</th>
                            <th>Professor</th>";
                        } else {
                            echo "<th>ID</th>
                             <th>Course Name</th>
                            <th>Actions</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($userid == 1) {
                        foreach ($courses as $course) {
                            echo "<tr>
                                 <td>" . htmlspecialchars($course['id']) . "</td>
                                 <td>" . htmlspecialchars($course['name']) . "</td>
                                <td>" . htmlspecialchars($course['professor_name']) . "</td>
                                </tr>";
                        }
                    } else {
                        foreach ($courses as $course):
                            echo "<tr>
                               <td>" . htmlspecialchars($course['id']) . "</td>
                                <td>" . htmlspecialchars($course['name']) . "</td>";
                    ?>
                            <td>
                                <div text-align="center">
                                    <a href="addquiz.php?id=<?php echo $course['id']; ?>" class="AddQuiz">Add Quiz</a>
                                </div>
                            </td>
                            </tr>
                    <?php
                        endforeach;
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>


    <?php require "sidePanal.php"; ?>


</body>

</html>