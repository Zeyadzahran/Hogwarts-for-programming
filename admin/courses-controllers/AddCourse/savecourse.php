<?php
    $rootDir = dirname(dirname(__DIR__));
    require $rootDir . "../adminClass.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!isset($_POST['course_name']) || empty($_POST['course_name'])) {
            header("Location: /professor/manageUsers?error=missingCourseName");
            exit();
        }

        $coursename = trim($_POST['course_name']);
        $professorname = isset($_POST['professor_name']) ? trim($_POST['professor_name']) : null;

        $obj = new admin();
        $result = $obj->addnewcourse($coursename, $professorname);

        if (!$result) {
            header("Location:/professor/manageUsers?success=courseAdded");
            exit();
        } else {
            header("Location: /professor/manageUsers?error=failedToAddCourse");
            exit();
        }
    } else {
        header("Location: /professor/manageUsers");
        exit();
    }
?>