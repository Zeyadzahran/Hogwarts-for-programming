<?php
$rootDir = dirname(dirname(__DIR__));
require_once $rootDir . "/user/userClass.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header('Location: /login?error=notloggedin');
    exit();
}

$userId = $_SESSION['id'];

$obj = new user();
$courses = $obj->getAllCourse($userId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="../../Styles/style.css">
</head>

<body>
    <?php require_once $rootDir . "/user/navPar.php"; ?>
    <div class="main-content">
        <div class="courses-container">
            <h1 class="courses-title">Hogwarts Courses</h1>
            <div class="courses-grid">
                <?php

                $magicalColors = [
                    ['#ffcc00', '#d4a900'],
                    ['#24aade', '#1d8fc7'],
                    ['#8a2be2', '#6a1bb5'],
                    ['#4CAF50', '#3d8b40'],
                    ['#ff9966', '#e68a5c'],
                    ['#b22222', '#8b0000'],
                    ['#66ccff', '#4da6cc'],
                    ['#ff66b2', '#e64d99']
                ];


                $magicalEmojis = [
                    '🧙',
                    '✨',
                    '📚',
                    '⚡',
                    '🧪',
                    '🔮',
                    '🌿',
                    '🦉',
                    '🕯️',
                    '📖',
                    '🔭',
                    '
                    🧿',
                    '⚗️',
                    '🌙',
                    '☄️',
                    '🌕',
                    '💫',
                    '🌟',
                    '🌠',
                    '🪄',
                    '🗝️',
                    '⚔️',
                    '🛡️',
                    '🏰'
                ];

                foreach ($courses as $course):

                    $randomColors = $magicalColors[array_rand($magicalColors)];

                    $randomEmoji = $magicalEmojis[array_rand($magicalEmojis)];
                ?>
                    <div class="course-card"
                        style="--course-color: <?= $randomColors[0] ?>">
                        <div class="course-header">
                            <div class="course-icon">
                                <?= $randomEmoji ?>
                            </div>
                            <h3 class="course-name"><?= htmlspecialchars($course['course_name']) ?></h3>
                        </div>

                        <div class="course-details">
                            <div class="course-professor">
                                <?= htmlspecialchars($course['professor_name']) ?>
                            </div>
                            <a href="../assignCourse.php?course_id=<?= $course['course_id'] ?>"
                                class="assign-btn">
                                Assign Course
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>