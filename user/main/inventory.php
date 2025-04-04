<?php
$rootDir = dirname(dirname(__DIR__));
require_once $rootDir . "/user/userClass.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id"])) {
    header("Location: /login?error=FailedOnInventory");
    exit();
}

$userId = $_SESSION["id"];
$userName = $_SESSION["name"];
$obj = new user();
$items = $obj->getUserItems($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="../../Styles/style.css">
</head>

<body>
    <?php require_once $rootDir . "/user/navPar.php"; ?>

    <div class="main-content">
        <div class="inventory-container">
            <h1 class="inventory-title"><?php echo htmlspecialchars($userName) ?>'s Inventory</h1>
            <div class="inventory-grid">
                <?php foreach ($items as $item): ?>
                    <div class="inventory-item <?= $item['item_count'] == 1 ? 'rare' : '' ?>">
                        <h3><?= htmlspecialchars($item['name']) ?></h3>
                        <img src="/user/main/shop/<?= htmlspecialchars($item['path']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                        <p><?= htmlspecialchars($item['description']) ?></p>
                        <span class="item-count">You have <?= htmlspecialchars($item['item_count']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>