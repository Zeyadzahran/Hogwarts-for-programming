<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


$rootDir = dirname(dirname(__DIR__));
require_once $rootDir . "/user/userClass.php";

$obj = new user();
//  echo "<pre>"; 
//  print_r($_SESSION);
//  echo "</pre>";
//  echo $_GET["courseid"];

$courseid = $_GET["courseid"];

$degree = $obj->getEnrollment($_SESSION['id'], $courseid)['Marks'];
// echo $degree ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quiz Attempted</title>
  <link rel="stylesheet" href="\user\quiz\done.css">
</head>

<body>

  <div class="message-container">
    <h1>Congrats, You've Finished the Quiz!</h1>
    <a href="/courses" class="setadmin">Back To My Courses</a>
    <h3>You got <?php echo $degree ?> Out of <?php echo $obj->getQuizPoints($obj->getQuizIdByCourse($courseid)['id']); ?></h3>
  </div>
</body>

</html>
