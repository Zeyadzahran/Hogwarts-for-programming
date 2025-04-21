<?php

    require "../../adminClass.php";

    session_start();
    if (!isset($_GET["userId"]) or !isset($_GET['course_id'])) {
        header("Location: /professor/manageUsers?error=can'tManageCourses");
        exit();
    }
    $userId = $_GET['userId'];
    $courseId = $_GET['course_id'];

    $obj = new admin();

    $result = $obj->addcourse($userId,$courseId);
    if ($result) {
        header("Location: /professor/manageUsers?success=courseAssigned");
        exit();
    } else {
        header("Location: /professor/manageUsers?error=assignmentFailed");
        exit();
    }
