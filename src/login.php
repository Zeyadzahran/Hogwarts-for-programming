<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Login</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username/Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="../src/index.php">Register here</a></p>
    </div>
</body>

</html>
