<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 'emptyinput') {
        echo "<p>Please fill in all fields.</p>";
    } elseif ($error == 'usernameisnotvalid') {
        echo "<p>Invalid username.</p>";
    } elseif ($error == 'emailisnotvalid') {
        echo "<p>Invalid email.</p>";
    } elseif ($error == 'passwordsdonotmatch') {
        echo "<p>Passwords do not match.</p>";
    } elseif ($error == 'useralreadyexists') {
        echo "<p>User already exists.</p>";
    } elseif ($error == 'statementfailed') {
        echo "<p>Something went wrong. Please try again.</p>";
    }
}
if (isset($_GET['success'])) {
    if ($_GET['success'] == 'registered') {
        echo "<p>Registration successful! Please login.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Login/Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2> Registeration page</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="rePassword" placeholder="Repeat Password" required>
            <button type="submit" name="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>