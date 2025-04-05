<?php
$rootDir = dirname(dirname(__DIR__));
require $rootDir . "../adminClass.php";
$userId = $_GET['id'];

$obj = new admin();
$courses = $obj->getfreeCourse($userId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="../../../Styles/style.css">
</head>

<body>
<nav class="navbar">
    <div class="nav-left">
        <img src="../../../Styles/logo.png" alt="Logo" class="nav-logo">
        <ul>
            <li><a href="../../main/dashboard.php" class="<?= ($current_page == 'dashboard.php') ? 'active' : '' ?>">🏨 dashboard</a></li>
            <li><a href="../../main/manageUsers.php" class="<?= ($current_page == 'manageUsers.php') ? 'active' : '' ?>">👥 Manage users</a></li>
            <li><a href="../../main/manageCourses.php" class="<?= ($current_page == 'manageCourses.php') ? 'active' : '' ?>">📚 manageCourses</a></li>
            <li><a href="../../main/LeaderBoard.php" class="<?= ($current_page == 'LeaderBoard.php') ? 'active' : '' ?>">🏠 Leaderboard</a></li>
        </ul>
    </div>
    <div class="nav-right">
        <a href="../../main/profile.php" class="<?= ($current_page == 'profile.php') ? 'active' : '' ?>">👤 Profile</a>
        <a href="../../../src/logout.php" class="logout <?= ($current_page == 'logout.php') ? 'active' : '' ?>">🚪 Logout</a>
    </div>
</nav>
    <div class="main-content">
        <div class="courses-container">
            <h1 class="courses-title">Not Assigned Courses</h1>
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
                    '🧙','✨', '📚','⚡','🧪','🔮','🌿','🦉','🕯️','📖','🔭','
                    🧿','⚗️','🌙','☄️','🌕','💫','🌟','🌠','🪄','🗝️','⚔️','🛡️','🏰'
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
                        <a href="<?php echo 'http://localhost/Hogwarts-for-programming/admin/users-controllers/addCourse/addcoursecontr.php?course_id=' . $course['course_id'] . '&userId=' . $userId; ?>" class="assign-btn">
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