<?php
  session_start();
  //=================> need anthor solution

  require "../userClass.php";

  $obj = new user();
  //  echo "<pre>"; 
  //  print_r($_SESSION);
  //  echo "</pre>";

   $degree = $obj->getEnrollment($_SESSION['id'], $_SESSION['course_id'])['Marks'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quiz Attempted</title>
  <link rel="stylesheet" href="done.css">
</head>

<body>

  <div class="message-container">
    <h1>Congrats, You've Finished the Quiz!</h1>
    <a href="/courses" class="setadmin">Back To My Courses</a>
    <h3>You got <?php echo $degree ?> Out of <?php echo $obj->getQuizPoints($obj->getQuizIdByCourse($_SESSION['course_id'])); ?></h3>
  </div>
</body>

</html>