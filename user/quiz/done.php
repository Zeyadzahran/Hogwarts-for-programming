<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quiz Attempted</title>
  <link rel="stylesheet" href="done.css">
</head>
<body>

  <div class="message-container">
    <h1>You've Already Taken the Quiz!</h1>
    <a href="../courses.php" class="setadmin">Back To My Courses</a>
  </div>
<?php

require "../userClass.php" ;

$obj = new user();
$quizid = $obj->getQuizIdByCourse($_SESSION['course']);
$points = $obj->getQuizPoints($quizid);
echo $points / 12 * $_SESSION['counter'] ;
?>
</body>
</html>
