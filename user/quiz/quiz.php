<?php
session_start(); // for explain if user comeback here after send the solutions don't start new session he complete old session *_*

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require "../userClass.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['done'][$_SESSION['course_id']] = true;
    $_SESSION['counter'] = 0;


    $user = new user();
    $courseid = $_GET["courseid"];
    $questions = $user->getQuestions($courseid);


    $quiz = [];
    foreach ($questions as $question) {
        $quiz[$question['question_text']] = $question['correct'];
    }

    foreach ($quiz as $key => $correct) :
        if (isset($_POST[$key]) && $_POST[$key] == $correct) ++$_SESSION['counter'];
    endforeach;
    // implment the logic for adding the points to db 

    $obj = new user();

    $quizid = $obj->getQuizIdByCourse($_SESSION['course_id']);
    $points = $obj->getQuizPoints($quizid);
    $degree = $points / count($quiz) * $_SESSION['counter'];
    $obj->addQuizPoints($_SESSION['id'], $degree, $_SESSION['course_id']);
    $obj->addHousePoints($_SESSION['house_id'], $degree);

    $obj->setDone($_SESSION['id'], $_SESSION['course_id']);

    $_SESSION['quizId'] = $quizid;

    header("Location: /done");
    exit;
} else if (isset($_SESSION['done'][$_SESSION['course_id']]) && $_SESSION['done'][$_SESSION['course_id']] === true) {
    header("Location: /done");
    exit;
} else {
    header("Location: /quiz");
    exit;
}
