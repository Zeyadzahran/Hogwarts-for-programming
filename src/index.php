<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../Styles/style.css">
    <style>
        /* Logo-specific adjustments */
        .logo-container {
            text-align: center;
            margin-bottom: 1.5rem;
            height: 80px;
            /* Fixed container height */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-container img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        /* Maintain original form layout */
        .auth-form {
            background: rgba(39, 51, 83, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 380px;
            border: 1px solid rgba(201, 183, 139, 0.3);
            animation: fadeIn 0.5s ease-out;
        }

        .auth-form h2 {
            color: #ffcc00;
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.3);
        }

        .auth-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 8px;
            background: rgba(11, 26, 53, 0.7);
            color: #f0e6d2;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(201, 183, 139, 0.1);
        }

        .auth-form button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #2174ae, #24aade);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .auth-form p {
            text-align: center;
            margin-top: 1.5rem;
            color: #c9b78b;
        }

        .auth-form a {
            color: #ffcc00;
            text-decoration: none;
        }
    </style>


</head>

<body class="auth-container">
    <div class="auth-form">
        <div class="logo-container">
            <img src="../Styles/logo.png" alt=" Logo">
        </div>
        <form action="/" method="post">
            <h2>Register</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="rePassword" placeholder="Repeat Password" required>
            <button type="submit" name="submit">Register</button>
            <p>Already have an account? <a href="/login">Login here</a></p>
        </form>
    </div>
</body>

</html>