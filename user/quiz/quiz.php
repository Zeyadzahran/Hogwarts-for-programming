<?php
session_start(); // for explain if user comeback here after send the solutions don't start new session he complete old session *_*




header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['done'] = true;
    $_SESSION['counter'] = 0;
    $quiz = [
        "answer1" => "False",
        "answer2" => "True",
        "answer3" => "True",
        "answer4" => "False",
        "answer5" => "True",
        "answer6" => "True",
        "answer7" => "rightAns",
        "answer8" => "rightAns",
        "answer9" => "rightAns",
        "answer10" => "rightAns",
        "answer11" => "rightAns",
        "answer12" => "rightAns",
    ];
    foreach($quiz as $key => $correct) :
        if(isset($_POST[$key]) && $_POST[$key] === $correct) ++$_SESSION['counter'];
    endforeach;
    // implment the logic for adding the points to db 
    require "../userClass.php";
    $obj = new user();
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    $quizid = $obj->getQuizIdByCourse($_SESSION['course_id']);
    $points = $obj->getQuizPoints($quizid);
    $degree = $points / 12 * $_SESSION['counter'];
    $obj->addQuizPoints($_SESSION['id'],$degree);
    $obj->addHousePoints($_SESSION['house_id'],$degree);

    $obj->setDone($_SESSION['id'],$_SESSION['course_id']);
    //==================================>

    $_SESSION['quizId'] = $quizid; 

    header("Location: done.php");
    exit;
} else if(isset($_SESSION['done']) && $_SESSION['done'] === true){
    header("Location: done.php");
    exit;
}
else{
    header("Location: structureQuiz.php");
    exit;
}

?>
