<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body class="auth-container">
    <div class="auth-form">
        <form action="/login" method="post">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">Login</button>
            <p>Don't have an account? <a href="/">Register here</a></p>
        </form>
    </div>
</body>

</html>