<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function addToCart($productId, $quantity = 1) {
    $productId = (int)$productId;
    $quantity = (int)$quantity;
    if ($quantity <= 0) $quantity = 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

function removeFromCart($productId) {
    $productId = (int)$productId;
    unset($_SESSION['cart'][$productId]);
    if (empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}

function updateCartQuantity($productId, $quantity) {
    $productId = (int)$productId;
    $quantity = (int)$quantity;
    if ($quantity <= 0) {
        removeFromCart($productId);
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

function getCartItems($db) {
    if (empty($_SESSION['cart'])) return [];

    $ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $pdo = $db->getPDO();
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($ids);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $items = [];
    foreach ($products as $p) {
        $qty = $_SESSION['cart'][$p['id']];
        $items[] = [
            'product' => $p,
            'quantity' => $qty,
            'subtotal' => $p['price'] * $qty
        ];
    }
    return $items;
}

function getCartTotalCount() {
    return empty($_SESSION['cart']) ? 0 : array_sum($_SESSION['cart']);
}

function getCartTotalSum($db) {
    $items = getCartItems($db);
    $total = 0;
    foreach ($items as $item) {
        $total += $item['subtotal'];
    }
    return $total;
}

function clearCart() {
    unset($_SESSION['cart']);
}