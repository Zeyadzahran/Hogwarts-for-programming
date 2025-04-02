<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP Quiz</title>
  <link rel="stylesheet" href="quize.css">
</head>
<body>
   <?php
   session_start();
   if(isset($_SESSION['done']) && $_SESSION['done'] === true){
    header("Location: done.php");
    exit;
}
?>
  <h1>Welcome To PHP Quiz Page</h1> 
  <form action="quiz.php" method="POST" class="quiz-container">
    
    <div class="question-card">
      <label>1. PHP is a client-side scripting language</label>
      <div class="options">
        <label><input type="radio" name="answer1" value="True" required> True</label>
        <label><input type="radio" name="answer1" value="False"> False</label>
      </div>
    </div>

    <div class="question-card">
      <label>2. You can embed HTML code inside PHP scripts</label>
      <div class="options">
        <label><input type="radio" name="answer2" value="True" required> True</label>
        <label><input type="radio" name="answer2" value="False"> False</label>
      </div>
    </div>

    <div class="question-card">
      <label>3. Variables in PHP must start with the $ symbol</label>
      <div class="options">
        <label><input type="radio" name="answer3" value="True" required> True</label>
        <label><input type="radio" name="answer3" value="False"> False</label>
      </div>
    </div>

    <div class="question-card">
      <label>4. PHP does not support object-oriented programming (OOP)</label>
      <div class="options">
        <label><input type="radio" name="answer4" value="True" required> True</label>
        <label><input type="radio" name="answer4" value="False"> False</label>
      </div>
    </div>

    <div class="question-card">
      <label>5. The echo statement is used to print output in PHP</label>
      <div class="options">
        <label><input type="radio" name="answer5" value="True" required> True</label>
        <label><input type="radio" name="answer5" value="False"> False</label>
      </div>
    </div>

    <div class="question-card">
      <label>6. PHP can interact with databases like MySQL</label>
      <div class="options">
        <label><input type="radio" name="answer6" value="True" required> True</label>
        <label><input type="radio" name="answer6" value="False"> False</label>
      </div>
    </div>

    <div class="question-card">
        <label>7. PHP can interact with databases like MySQL</label>
        <div class="options">
          <label><input type="radio" name="answer7" value="rightAns" required>&lt;?php</label>
          <label><input type="radio" name="answer7" value="falseAns">&lt;php&gt;</label>
          <label><input type="radio" name="answer7" value="falseAns" required>&lt;script&gt;</label>
          <label><input type="radio" name="answer7" value="falseAns">&lt;?PHPBlock</label>
        </div>
      </div>
    
      <div class="question-card">
        <label>8. Which of the following is the correct way to declare a variable in PHP?</label>
        <div class="options">
          <label><input type="radio" name="answer8" value="rightAns" required>$varName = "Hello";</label>
          <label><input type="radio" name="answer8" value="falseAns">var varName = "Hello";</label>
          <label><input type="radio" name="answer8" value="falseAns">string varName = "Hello";</label>
          <label><input type="radio" name="answer8" value="falseAns">declare varName = "Hello";</label>
        </div>
      </div>
      
      <div class="question-card">
        <label>9. What does the `isset()` function do in PHP?</label>
        <div class="options">
          <label><input type="radio" name="answer9" value="falseAns" required>Deletes a variable</label>
          <label><input type="radio" name="answer9" value="rightAns">Checks if a variable is set and is not null</label>
          <label><input type="radio" name="answer9" value="falseAns">Initializes a variable</label>
          <label><input type="radio" name="answer9" value="falseAns">Returns the type of variable</label>
        </div>
      </div>
      
      <div class="question-card">
        <label>10. Which of the following is used to include a PHP file into another file?</label>
        <div class="options">
          <label><input type="radio" name="answer10" value="falseAns" required>insert "file.php";</label>
          <label><input type="radio" name="answer10" value="rightAns">include "file.php";</label>
          <label><input type="radio" name="answer10" value="falseAns">add "file.php";</label>
          <label><input type="radio" name="answer10" value="falseAns">link "file.php";</label>
        </div>
      </div>
      
      <div class="question-card">
        <label>11. What is the correct way to start a session in PHP?</label>
        <div class="options">
          <label><input type="radio" name="answer11" value="falseAns" required>start_session();</label>
          <label><input type="radio" name="answer11" value="falseAns">begin_session();</label>
          <label><input type="radio" name="answer11" value="rightAns">session_start();</label>
          <label><input type="radio" name="answer11" value="falseAns">session.begin();</label>
        </div>
      </div>
      
      <div class="question-card">
        <label>12. Which superglobal variable is used to collect form data sent with POST method?</label>
        <div class="options">
          <label><input type="radio" name="answer12" value="falseAns" required>$_GET</label>
          <label><input type="radio" name="answer12" value="rightAns">$_POST</label>
          <label><input type="radio" name="answer12" value="falseAns">$_REQUEST</label>
          <label><input type="radio" name="answer12" value="falseAns">$_FORM</label>
        </div>
      </div>
      
    <button type="submit">submit</button>

  </form>

</body>
</html>