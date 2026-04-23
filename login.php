<?php
require_once __DIR__ . '/src/Base.php';

$title = 'Вход - PLUSHKI';

if (isLoggedIn()) {
    header('Location: profile.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_submit'])) {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($login) || empty($password)) {
        $error = 'Введите логин и пароль';
    } else {
        $pdo = $db->getPDO();
        $stmt = $pdo->prepare("SELECT id, login, password_hash FROM users WHERE login = ? OR email = ?");
        $stmt->execute([$login, $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password_hash'])) {
            loginUser($user['id'], $user['login']);
            
            // Перенос сессионной корзины в БД
    //         if (!empty($_SESSION['cart'])) {
    //             $pdo = $db->getPDO();
    //             foreach ($_SESSION['cart'] as $productId => $quantity) {
    //                 $stmt = $pdo->prepare("INSERT INTO cart_items (user_id, product_id, quantity) 
    //                                        VALUES (?, ?, ?) 
    //                                        ON DUPLICATE KEY UPDATE quantity = quantity + ?");
    //                 $stmt->execute([$user['id'], $productId, $quantity, $quantity]);
    //             }
    //             unset($_SESSION['cart']);
    //         }
            
    //         header('Location: profile.php');
    //         exit;
    //     } else {
    //         $error = 'Неверный логин или пароль';
        }
    }
}

$content = 'html/login';
require_once 'html/main.php';
?>