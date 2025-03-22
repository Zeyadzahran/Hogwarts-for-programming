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
    <p>Sorry, you can't retake the quiz at the moment. Please check back later.</p>
  </div>
<?php
session_start();
echo $_SESSION['counter'];
?>
</body>
</html>
