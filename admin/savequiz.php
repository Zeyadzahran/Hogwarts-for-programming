<?php

require("adminClass.php");

if (isset($_GET['id']))
{
    $courseid = $_GET['id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quizname = $_POST['quiz_name'];
    $points = $_POST['points'];
}

$obj = new admin();
$obj->addquiz($quizname,$courseid,$points);

header("location: ../admin/manageCourses.php?success=1");
exit();

