<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
<link rel="stylesheet" href="../../Styles/style.css">
<nav class="navbar">
    <div class="nav-left">
        <img src="../../Styles/logo.png" alt="Logo" class="nav-logo">
        <ul>
            <li><a href="../courses.php" class="<?= ($current_page == 'courses.php') ? 'active' : '' ?>">📚 My Courses</a></li>
            <li><a href="../ManageCourses.php" class="<?= ($current_page == 'ManageCourses.php') ? 'active' : '' ?>">📚 Assign Courses</a></li>
            <li><a href="../shop/shop.php" class="<?= ($current_page == 'shop.php') ? 'active' : '' ?>">🛒 Shop</a></li>
            <li><a href="../inventory.php" class="<?= ($current_page == 'inventory.php') ? 'active' : '' ?>">🎒 Inventory</a></li>
            <li><a href="../LeaderBoard.php" class="<?= ($current_page == 'LeaderBoard.php') ? 'active' : '' ?>">🏠 Leaderboard</a></li>
        </ul>
    </div>
    <div class="nav-right">
        <a href="../Profile.php" class="<?= ($current_page == 'Profile.php') ? 'active' : '' ?>">👤 Profile</a>
        <a href="../../src/logout.php" class="logout <?= ($current_page == 'logout.php') ? 'active' : '' ?>">🚪 Logout</a>
    </div>
</nav>