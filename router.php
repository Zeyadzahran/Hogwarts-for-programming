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
        case '/editProfile':
            require 'includes/edit.inc.php';
            exit();
        case '/login':
            require 'includes/login.inc.php';
            exit();
        case '/':
            require 'includes/signup.inc.php';
            exit();    
        case '/addcourse':
            require 'admin/courses-controllers/AddCourse/savecourse.php';
            exit();
        case '/professor/addquiz':
            require 'admin/courses-controllers/AddQuiz/savequiz.php';
            exit();
        case '/professor/addquestion':
            require 'admin/courses-controllers/AddQuiz/savequestion.php';
        exit();
        case '/quiz':
            require 'user/quiz/quiz.php';
            exit();
    }
}

//  access levels
$routeAccess = [
    // Public routes (no login required)
    'public' => [
        '/',
        '/login',
        '/register',
        '/logout'
    ],
    // Student (user) routes
    'student' => [
        '/student/dashboard',
        '/student/leaderboard',
        '/student/profile',
        '/courses',
        '/assignments',
        '/shop',
        '/shop/buy',
        '/inventory',
        '/quiz',
        '/done'
    ],
    // Professor (admin) routes
    'admin' => [
        '/professor/dashboard',
        '/professor/leaderboard',
        '/professor/profile',
        '/professor/manageUsers',
        '/professor/manageCourses',
        '/professor/addquiz',
        '/professor/addquestion'
    ]
];

//  routes
$routes = [
    // General pages
    '/' => 'src/index.php',
    '/login' => 'src/login.php',
    '/logout' => 'src/logout.php',
    '/register' => 'src/index.php',
    '/editProfile' => 'src/editprofile.php',

    // Student (user) pages
    '/student/dashboard' => 'user/main/dashboard.php',
    '/student/leaderboard' => 'user/main/leaderBoard.php',
    '/student/profile' => 'user/main/profile.php',
    '/courses' => 'user/main/courses.php',
    '/assignments' => 'user/main/manageCourses.php',
    '/shop' => 'user/main/shop/shop.php',
    '/shop/buy' => 'user/main/shop/BuyItem.php',
    '/inventory' => 'user/main/inventory.php',
    '/quiz' => 'user/quiz/structureQuiz.php',
    '/done' => 'user/quiz/done.php',

    // Professor (admin) pages
    '/professor/dashboard' => 'admin/main/dashboard.php',
    '/professor/leaderboard' => 'admin/main/leaderBoard.php',
    '/professor/profile' => 'admin/main/profile.php',
    '/professor/manageUsers' => 'admin/main/manageUsers.php',
    '/professor/manageCourses' => 'admin/main/manageCourses.php',
    '/addcourse' => 'admin/courses-controllers/AddCourse/newcourse.php',
    '/assignCourse' => 'admin/users-controllers/addCourse/addcourse.php',
    '/professor/addquiz' => 'admin/courses-controllers/AddQuiz/addquiz.php',
    '/professor/addquestion' => 'admin/courses-controllers/AddQuiz/addquestion.php'
];

// not found

if (!array_key_exists($uri, $routes)) {
    http_response_code(404);
    require 'src/404.php';
    exit();
}

// user access pages  
if (!in_array($uri, $routeAccess['public'])) {

    if (!isset($_SESSION['id'])) {
        header('Location: /login?error=notloggedin');
        exit();
    }

    $userRole = $_SESSION['role'] ?? 'Student';

    if (in_array($uri, $routeAccess['admin']) && $userRole != 'Admin') {
        http_response_code(403);
        require 'src/403.php';
        exit();
    }
    if (in_array($uri, $routeAccess['student']) && $userRole != 'Student') {
        http_response_code(403);
        require 'src/403.php';
        exit();
    }
}

require $routes[$uri];
