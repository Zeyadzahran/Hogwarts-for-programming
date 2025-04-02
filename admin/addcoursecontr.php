<?php

require "adminClass.php";

session_start();
if (!isset($_SESSION["id"]) or !isset($_GET['course_id'])) {
    header("Location: ManageCourses.php?error=can'tManageCourses");
    exit();
}
$userId = $_SESSION['id'];
$courseId = $_GET['course_id'];

$obj = new admin();

$result = $obj->addcousre($userId,$courseId);
if ($result) {
    header("Location: ManageCourses.php?success=courseAssigned");
    exit();
} else {
    header("Location: ManageCourses.php?error=assignmentFailed");
    exit();
}
