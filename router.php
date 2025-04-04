<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle POST requests for login and register
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($uri) {
        case '/register':
            require 'includes/signup.inc.php';
            exit();
        case '/login':
            require 'includes/login.inc.php';
            exit();
    }
}

// Static routes
$routes = [
    // General pages
    '/' => 'src/index.php',
    '/login' => 'src/login.php',
    '/logout' => 'src/logout.php',
    '/register' => 'src/index.php',

    // Student (user) pages
    '/student/dashboard' => 'user/main/dashboard.php',
    '/student/leaderboard' => 'user/main/leaderBoard.php',
    '/student/profile' => 'user/main/profile.php',
    '/courses' => 'user/main/courses.php',
    '/assignments' => 'user/main/manageCourses.php',
    '/shop' => 'user/main/shop/shop.php',
    '/shop/buy' => 'user/main/shop/BuyItem.php',
    '/inventory' => 'user/main/inventory.php',

    // Professor (admin) pages
    '/professor/dashboard' => 'admin/main/dashboard.php',
    '/professor/leaderboard' => 'admin/main/leaderBoard.php',
    '/professor/profile' => 'admin/main/profile.php',
    '/professor/manageUsers' => 'admin/main/manageUsers.php',
    '/professor/manageCourses' => 'admin/main/manageCourses.php',

];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    require 'src/404.php';
}
