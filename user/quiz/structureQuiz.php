<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quiz</title>
  <link rel="stylesheet" href="/user/quiz/quize.css">
</head>
<body>
   <?php
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
   require_once realpath(__DIR__ . '/../userClass.php');
   if(isset($_SESSION['done']) && $_SESSION['done'] === true){
    header("Location: /done");
    exit; 
}
    if (isset($_GET["courseid"]))
    {
      $courseid = $_GET["courseid"];
    }
    $user = new user();
    $questions = $user->getQuestions($courseid);
?>
  <h1>Quiz Page</h1> 
  <form action="/quiz?courseid=<?php echo $courseid ?>" method="POST" class="quiz-container">

  <?php
      $i = 1;
      foreach($questions as $question):
  ?>

    <div class="question-card">
        <label><?php echo $i . ". " . $question["question_text"] . "?"?></label>
        <div class="options">
          <label><input type="radio" name="<?php echo $question["question_text"] ?>" value="1">
                    <?php echo htmlspecialchars($question["option1"]); ?>
          </label>
          <label><input type="radio" name="<?php echo $question["question_text"] ?>" value="2">
                    <?php echo htmlspecialchars($question["option2"]); ?>
          </label>
          <label><input type="radio" name="<?php echo $question["question_text"] ?>" value="3">
                    <?php echo htmlspecialchars($question["option3"]); ?>
          </label>
          <label><input type="radio" name="<?php echo $question["question_text"] ?>" value="4">
                    <?php echo htmlspecialchars($question["option4"]); ?>
          </label>
        </div>
      </div>
  <?php 
      $i++;
      endforeach;
  ?>
    <button type="submit">submit</button>

  </form>

</body>
</html>