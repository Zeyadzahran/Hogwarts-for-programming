<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Quiz</h2>
        <form action="" method="POST">
            <label for="quiz_name">Quiz Name:</label>
            <input type="text" name="quiz_name" required>
            <label for="duration">Duration (minutes):</label>
            <input type="number" name="duration" required>
            <label for="points">Points</label>
            <input type="number" name="points" required>
            <button type="submit">Done</button>
        </form>
    </div>
</body>
</html>
