<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<link rel="stylesheet" href="../Styles/style.css">
<nav class="navbar">
    <div class="nav-left">
        <img src="../Styles/logo.png" alt="Logo" class="nav-logo">
        <ul>
            <li><a href="dashboard.php" class="<?= ($current_page == 'dashboard.php') ? 'active' : '' ?>">🏨 dashboard</a></li>
            <li><a href="manageUsers.php" class="<?= ($current_page == 'manageUsers.php') ? 'active' : '' ?>">👥 Manage users</a></li>
            <li><a href="manageCourses.php" class="<?= ($current_page == 'manageCourses.php') ? 'active' : '' ?>">📚 manageCourses</a></li>
            <li><a href="LeaderBoard.php" class="<?= ($current_page == 'LeaderBoard.php') ? 'active' : '' ?>">🏠 Leaderboard</a></li>
        </ul>
    </div>
    <div class="nav-right">
        <a href="Profile.php" class="<?= ($current_page == 'Profile.php') ? 'active' : '' ?>">👤 Profile</a>
        <a href="../src/logout.php" class="logout <?= ($current_page == 'logout.php') ? 'active' : '' ?>">🚪 Logout</a>
    </div>
</nav>

