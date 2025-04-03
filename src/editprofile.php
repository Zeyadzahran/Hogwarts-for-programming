<?php
  require '../admin/adminclass.php';
   
  session_start();

    if (!isset($_SESSION["id"])) {
        header("Location: ../src/login.php?error=FailedOnUserProfile");
        exit();
    }

    $userId = $_SESSION["id"];

    $getuser = new admin();
    $userData = $getuser->getuser($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body class="auth-container">
    <div class="auth-form">
        <form action="../includes/edit.inc.php" method="post">
            <h2>Edit Profile</h2>
            <input type="text" name="username" value="<?php echo $userData["name"]; ?>" required>
            <input type="email" name="email" value="<?php echo $userData["email"];  ?>"  required>
            <input type="password" name="password" placeholder="current Password" required>
            <input type="password" name="newpassword" placeholder="new Password">
            <input type="password" name="repassword" placeholder="repeat Password">
            <button type="submit" name="submit">Save</button>
            <a href="
            <?php if($userData["role"] === "Admin") 
                        echo "../admin/main/profile.php";
                  else
                        echo "../user/main/profile.php";
            ?>" class="cancel">Cancel</a>
        </form>
    </div>
</body>

</html>