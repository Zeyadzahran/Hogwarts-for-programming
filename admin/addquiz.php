<?php

if (isset($_GET['id'])) {
    $courseid = $_GET['id'];
}

?>

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
        <form action="savequiz.php?id=<?php echo $courseid ?>" method="POST">
            <input type="text" name="quiz_name" placeholder="Quiz Name" required>
            <input type="number" name="duration" placeholder="Duration (minutes)" required>
            <input type="number" name="points" placeholder="Points" required>
            <button type="submit">Done</button>
        </form>
    </div>
</body>

</html>