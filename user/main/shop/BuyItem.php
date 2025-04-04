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

if (!isset($_GET['item_id'])) {
    header("Location: /shop?error=invalid_item");
    exit();
}

$userId = $_SESSION['id'];
$itemId = $_GET['item_id'];

$shop = new Shop();
$shop->addItem($userId, $itemId);

header("Location: /shop?success=item_purchased");
exit();
