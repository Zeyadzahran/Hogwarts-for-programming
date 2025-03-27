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
    <?php require "navPar.php"; ?>

    <div class="dashboard-container">
        <h2>All Courses</h2>
        <div class="courses-rows-container">
            <?php if ($userid == 1): ?>
                <?php foreach ($courses as $course): ?>
                    <div class="course-row">
                        <div class="course-info">
                            <div class="course-info-item">
                                <span class="course-info-label">ID</span>
                                <span class="course-info-value"><?php echo htmlspecialchars($course['id']); ?></span>
                            </div>
                            <div class="course-info-item">
                                <span class="course-info-label">Course Name</span>
                                <span class="course-info-value"><?php echo htmlspecialchars($course['name']); ?></span>
                            </div>
                            <div class="course-info-item">
                                <span class="course-info-label">Professor</span>
                                <span class="course-info-value"><?php echo htmlspecialchars($course['professor_name']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($courses as $course): ?>
                    <div class="course-row">
                        <div class="course-info">
                            <div class="course-info-item">
                                <span class="course-info-label">ID</span>
                                <span class="course-info-value"><?php echo htmlspecialchars($course['id']); ?></span>
                            </div>
                            <div class="course-info-item">
                                <span class="course-info-label">Course Name</span>
                                <span class="course-info-value"><?php echo htmlspecialchars($course['name']); ?></span>
                            </div>
                        </div>
                        <div class="course-actions">
                            <a href="addquiz.php?id=<?php echo $course['id']; ?>" class="AddQuiz">Add Quiz</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>



</body>

</html>