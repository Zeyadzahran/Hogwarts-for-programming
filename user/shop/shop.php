<?php
require "shopCntr.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("location: shop.php?error=notLoggedIn");
    exit();
}

$obj = new Shop();
$items = $obj->getItems();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ravenclaw Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

   
    <div class="sidebar">
        <ul>
            <li><a href="../Profile.php">👤 My Profile</a></li>
            <li><a href="../courses.php">📚 My Courses</a></li>
            <li><a href="../quiz.php">َ📊 Quiz</a></li>
            <li><a href="../shop/shop.php">🛒 Shop</a></li>
            <li><a href="../inventory.php">🎒 Inventory</a></li>
            <li><a href="../LeaderBoard.php">🏠 Houses Leaderboard</a></li>
            <li><a href="../../src/logout.php" class="logout">🚪 Logout</a></li>
        </ul>
    </div>

   
    <div class="shop-container">
        <h1 class="shop-title">Welcome to the Ravenclaw Shop</h1>
        <div class="items-grid">
            <?php foreach ($items as $item): ?>
                <div class="item">
                    <h3><?= htmlspecialchars($item['name']) ?></h3>
                    <img src="<?= htmlspecialchars($item['path']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    <p><?= htmlspecialchars($item['description']) ?></p>
                    <a href="../shop/BuyItem.php?item_id=<?= urlencode($item['id']) ?>" class="buy-button">Buy</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>