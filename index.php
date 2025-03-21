

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