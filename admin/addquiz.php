<?php
session_start();
require("..\classes\dbh.classes.php");

if (!isset($_GET['course_id'])) {
    die("Invalid access! No course selected.");
}

$course_id = $_GET['course_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $points = $_POST['points'];
    
    $data = new dbh();
    $conn = $data->connect();

    $stmt = $conn->prepare("INSERT INTO Quiz (course_id, points) VALUES (?, ?)");
    $stmt->execute([$course_id, $points]);

    echo "Quiz added successfully!";
    header("Location: manage_courses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Add Quiz for Course ID: <?= $course_id ?></h2>
    <form method="post">
        <label for="points">Quiz Points:</label>
        <input type="number" name="points" required>

        <h3>Quiz Questions</h3>
        <div id="questions-container">
            <div class="question">
                <label>Question:</label>
                <input type="text" name="questions[]" required>
                <div class="options">
                    <input type="text" name="options[0][]" placeholder="Option 1" required>
                    <input type="text" name="options[0][]" placeholder="Option 2" required>
                    <input type="text" name="options[0][]" placeholder="Option 3">
                    <input type="text" name="options[0][]" placeholder="Option 4">
                </div>
            </div>
        </div>
        <button type="button" onclick="addQuestion()">Add Another Question</button>
        <button type="submit">Done</button>
    </form>
</div>

</body>
</html>
