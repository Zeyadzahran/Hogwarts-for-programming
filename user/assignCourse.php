<?php

require "userClass.php";

session_start();
if (!isset($_SESSION["id"]) or !isset($_GET['course_id'])) {
    header("Location: /assignments?error=can'tManageCourses");
    exit();
}
$userId = $_SESSION['id'];
$courseId = $_GET['course_id'];

$obj = new user();

$result = $obj->addNewCourse($userId,$courseId);
if ($result) {
    header("Location: /assignments?success=courseAssigned");
    exit();
} else {
    header("Location: /assignments?error=assignmentFailed");
    exit();
}
