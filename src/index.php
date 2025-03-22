<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Login/Register</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>
    <div class="container">
        
        <form action="../includes/signup.inc.php" method="post">
            <h2> Register </h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="rePassword" placeholder="Repeat Password" required>
            <button type="submit" name="submit">Register</button>
            <p>Already have an account? <a href="../src/login.php">Login here</a></p>
        </form>
        
    </div>
</body>

</html>
