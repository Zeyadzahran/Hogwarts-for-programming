<?php

    $rootDir = dirname(dirname(__DIR__));
    require $rootDir . "../adminClass.php";

    if (isset($_GET['id']))
    {
        $courseid = $_GET['id'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quizname = $_POST['quiz_name'];
        $points = $_POST['points'];
    }

    $obj = new admin();
    $quizid= $obj->addquiz($quizname,$courseid,$points);


    header("location: /professor/addquestion?quizid=$quizid");
    exit();

