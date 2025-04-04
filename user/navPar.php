<?php
$current_uri = parse_url($_SERVER['REQUEST_URI'])['path'];
?>

<link rel="stylesheet" href="../Styles/style.css">
<nav class="navbar">
    <div class="nav-left">
        <img src="../../Styles/logo.png" alt="Logo" class="nav-logo">
        <ul>
            <li><a href="/courses" class="<?= ($current_uri == '/courses') ? 'active' : '' ?>">📚 My Courses</a></li>
            <li><a href="/assignments" class="<?= ($current_uri == '/assignments') ? 'active' : '' ?>">📚 Assign Courses</a></li>
            <li><a href="/shop" class="<?= ($current_uri == '/shop') ? 'active' : '' ?>">🛒 Shop</a></li>
            <li><a href="/inventory" class="<?= ($current_uri == '/inventory') ? 'active' : '' ?>">🎒 Inventory</a></li>
            <li><a href="/student/leaderboard" class="<?= ($current_uri == '/student/leaderboard') ? 'active' : '' ?>">🏆 Leaderboard</a></li>
        </ul>
    </div>
    <div class="nav-right">
        <a href="/student/profile" class="<?= ($current_uri == '/student/profile') ? 'active' : '' ?>">👤 Profile</a>
        <a href="/logout" class="logout <?= ($current_uri == '/logout') ? 'active' : '' ?>">🚪 Logout</a>
    </div>
</nav>