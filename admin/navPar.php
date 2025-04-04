<?php
$current_uri = parse_url($_SERVER['REQUEST_URI'])['path'];
?>

<link rel="stylesheet" href="../Styles/style.css">
<nav class="navbar">
    <div class="nav-left">
        <img src="../../Styles/logo.png" alt="Logo" class="nav-logo">
        <ul>
            <li><a href="/professor/dashboard" class="<?= ($current_uri == '/professor/dashboard') ? 'active' : '' ?>">🏨 Dashboard</a></li>
            <li><a href="/professor/manageUsers" class="<?= ($current_uri == '/professor/manageUsers') ? 'active' : '' ?>">👥 Manage Users</a></li>
            <li><a href="/professor/manageCourses" class="<?= ($current_uri == '/professor/manageCourses') ? 'active' : '' ?>">📚 Manage Courses</a></li>
            <li><a href="/professor/leaderboard" class="<?= ($current_uri == '/professor/leaderboard') ? 'active' : '' ?>">🏆 Leaderboard</a></li>
        </ul>
    </div>
    <div class="nav-right">
        <a href="/professor/profile" class="<?= ($current_uri == '/professor/profile') ? 'active' : '' ?>">👤 Profile</a>
        <a href="/logout" class="logout <?= ($current_uri == '/logout') ? 'active' : '' ?>">🚪 Logout</a>
    </div>
</nav>