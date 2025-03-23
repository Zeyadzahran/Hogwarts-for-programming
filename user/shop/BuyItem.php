<?php
session_start();
require "../shop/shopCntr.php";


if (!isset($_SESSION['id'])) {
    header("location: shop.php?error=not_logged_in");
    exit();
}

if (!isset($_GET['item_id'])) {
    header("location: shop.php?error=invalid_item");
    exit();
}

$userId = $_SESSION['id']; 
$itemId = $_GET['item_id']; 

$shop = new Shop();
$shop->addItem($userId, $itemId);

header("location: shop.php?success=item_purchased");
exit();
?>