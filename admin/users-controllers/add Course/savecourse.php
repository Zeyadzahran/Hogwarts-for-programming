<?php
require "../../adminClass.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['course_name']) || empty($_POST['course_name'])) {
        header("Location: ../../main/manageCourses.php?error=missingCourseName");
        exit();
    }

    $coursename = trim($_POST['course_name']);
    $professorname = isset($_POST['professor_name']) ? trim($_POST['professor_name']) : null;

    $obj = new admin();
    $result = $obj->addnewcourse($coursename, $professorname);

    if (!$result) {
        header("Location: ../../main/manageCourses.php?success=courseAdded");
        exit();
    } else {
        header("Location: ../../main/manageCourses.php?error=failedToAddCourse");
        exit();
    }
} else {
    header("Location: ../../main/manageCourses.php");
    exit();
}
?>