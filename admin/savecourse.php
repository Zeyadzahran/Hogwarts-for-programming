<?php
require "adminClass.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['course_name']) || empty($_POST['course_name'])) {
        header("Location: manageCourses.php?error=missingCourseName");
        exit();
    }

    $coursename = trim($_POST['course_name']);
    $professorname = isset($_POST['professor_name']) ? trim($_POST['professor_name']) : null;

    $obj = new admin();
    $result = $obj->addnewcourse($coursename, $professorname);

    if (!$result) {
        header("Location: manageCourses.php?success=courseAdded");
        exit();
    } else {
        header("Location: manageCourses.php?error=failedToAddCourse");
        exit();
    }
} else {
    header("Location: manageCourses.php");
    exit();
}
?>