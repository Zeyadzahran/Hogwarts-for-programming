<?php
$rootDir = dirname(dirname(dirname(__DIR__)));
require_once $rootDir . "/user/main/shop/shopCntr.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: /login?error=notloggedin");
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
    <link rel="stylesheet" href="../../Styles/style.css">
</head>

<body>
    <?php require_once $rootDir . "/user/navPar.php"; ?>
    <div class="main-content">
        <div class="shop-container">
            <h1 class="inventory-title">Welcome to the Ravenclaw Shop</h1>
            <div class="items-grid">
                <?php foreach ($items as $item): ?>
                    <div class="item">
                        <h3><?= htmlspecialchars($item['name']) ?></h3>
                        <img src="/user/main/shop/<?= htmlspecialchars($item['path']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">

                        <p><?= htmlspecialchars($item['description']) ?></p>
                        <a href="/shop/buy?item_id=<?= urlencode($item['id']) ?>" class="buy-button">Buy</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>