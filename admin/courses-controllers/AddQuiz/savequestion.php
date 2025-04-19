<?php

$rootDir = dirname(dirname(__DIR__));
require $rootDir . "../adminClass.php";

$quiz_id = $_POST['quizid'];
$question = $_POST['question'];
$choice_a = $_POST['choice_a'];
$choice_b = $_POST['choice_b'];
$choice_c = $_POST['choice_c'];
$choice_d = $_POST['choice_d'];
$correct = $_POST['correct'];


$obj = new admin();

$obj->addquestion($quiz_id,$question,$choice_a,$choice_b,$choice_c,$choice_d,$correct);

header("location: /professor/addquestion?quizid=$quiz_id");
exit();

?>
