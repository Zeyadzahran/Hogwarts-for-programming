<?php

require("adminClass.php");


session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=Can'tManegeUser!");
    exit();
}
$userId = $_SESSION["id"]; // we will not use it here but i think we must keep it if we will use it in other pages  
$userRole = $_SESSION["role"];
$obj = new admin();
$users = $obj->GetUsers($userId);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>
    <?php require "navPar.php"; ?>

    <div class="dashboard-container">
        <h2>Users Data</h2>
        <div class="user-rows-container">
            <?php foreach ($users as $user): ?>
                <div class="user-row">
                    <div class="user-info">
                        
                        <div class="user-info-item">
                            <span class="user-info-label">ID</span>
                            <span class="user-info-value"><?php echo htmlspecialchars($user['id']); ?></span>
                        </div>
                        <div class="user-info-item">
                            <span class="user-info-label">Name</span>
                            <span class="user-info-value"><?php echo htmlspecialchars($user['name']); ?></span>
                        </div>
                        <div class="user-info-item">
                            <span class="user-info-label">Email</span>
                            <span class="user-info-value"><?php echo htmlspecialchars($user['email']); ?></span>
                        </div>
                        <div class="user-info-item">
                            <span class="user-info-label">Role</span>
                            <span class="user-info-value"><?php echo htmlspecialchars($user['role']); ?></span>
                        </div>
                        <div class="user-info-item">
                            <span class="user-info-label">Wand</span>
                            <span class="user-info-value"><?php echo htmlspecialchars($user['wand_name']); ?></span>
                        </div>
                        <?php if($userId !== 1){?>
                                <div class="user-info-item">
                                <span class="user-info-label">House</span>
                                <span class="user-info-value"><?php echo htmlspecialchars($user['house_name']); ?></span>
                            </div>
                        <?php }  ?>
                        
                    </div>
                    <div class="user-actions">
                    <a href="deleteContr.php?id=<?php echo $user['id']; ?>" class="delete">Delete</a>
                    <?php if ($userId == 1) { ?> 
                        <?php if ($user['role'] === "Student") { ?>
                            <a href="adminContr.php?id=<?php echo $user['id']; ?>" class="setadmin">Set Admin</a>
                        <?php } else if ($user['role'] === "Admin") { ?>
                            <a href="addcourse.php?id=<?php echo $user['id']; ?>" class="setadmin">Add Course</a>
                        <?php } ?>

                    <?php } else if ($userRole === "Admin" && $user['role'] === "Student") { ?> 
                        <a href="adminContr.php?id=<?php echo $user['id']; ?>" class="setadmin">Set Admin</a>
                       <?php } ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>

