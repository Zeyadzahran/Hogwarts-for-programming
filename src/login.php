<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Login</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>
    <div class = "reg">
    <div class="container">
        <form action="../includes/login.inc.php" method="post">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username/Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">Login</button>
            <p>Don't have an account? <a href="../src/index.php">Register here</a></p>
        </form>
    </div>
    </div>
</body>

</html>