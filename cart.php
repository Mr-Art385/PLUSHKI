<?php
require_once __DIR__ . '/src/Base.php';

$title = 'Корзина - PLUSHKI';

// Добавление товара (через GET)
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
    if ($id > 0) {
        addToCart($id, $quantity);
        $_SESSION['flash_message'] = 'Товар добавлен в корзину!';
        $_SESSION['flash_type'] = 'success';
    }
    $returnUrl = isset($_GET['return']) ? $_GET['return'] : 'katalog.php';
    header("Location: $returnUrl");
    exit;
}

// Обновление количества (через POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $id => $qty) {
            $id = (int)$id;
            $qty = (int)$qty;
            if ($qty <= 0) {
                removeFromCart($id);
            } else {
                updateCartQuantity($id, $qty);
            }
        }
    }
    header('Location: cart.php');
    exit;
}

// Очистка корзины
if (isset($_GET['action']) && $_GET['action'] === 'clear') {
    clearCart();
    header('Location: cart.php');
    exit;
}

// Удаление одного товара
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    removeFromCart((int)$_GET['id']);
    header('Location: cart.php');
    exit;
}

$cartItems = getCartItems($db);
$totalSum = getCartTotalSum($db);
$content = 'html/cart';

require_once 'html/main.php';
?>