<?php

require "userClass.php";

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: dashboard.php?error=FailedOnInventory");
    exit();
}


$userId =  $_SESSION["id"];
$userName =  $_SESSION["name"];
$obj = new user();
$items = $obj->getUserItems($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="../user/shop/styles.css">
</head>

<body>
    <div class="userbk">
        <div class="dashboard-container">
            <div class="shop-container">
                <h1 class="shop-title"><?php echo "$userName's " ?>Inventory</h1>
                <div class="items-grid">
                    <?php foreach ($items as $item): ?>
                        <div class="item">
                            <h3><?= htmlspecialchars($item['name']) ?></h3>
                            <img src="shop/<?= htmlspecialchars($item['path']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                            <p><?= htmlspecialchars($item['description']) ?></p>
                            <h4>You have <?= htmlspecialchars($item['item_count']) ?> from this item</h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require "sidePanal.php" ?>

</html>