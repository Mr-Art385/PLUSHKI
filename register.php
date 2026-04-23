<?php
require_once __DIR__ . '/src/Base.php';

$title = 'Регистрация - PLUSHKI';

if (isLoggedIn()) {
    header('Location: profile.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $login = trim($_POST['login'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';
    
    if (empty($login) || empty($email) || empty($password)) {
        $error = 'Заполните все поля';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Некорректный email';
    } elseif (strlen($password) < 6) {
        $error = 'Пароль должен быть не менее 6 символов';
    } elseif ($password !== $confirm) {
        $error = 'Пароли не совпадают';
    } elseif (userExists($db, $login, $email)) {
        $error = 'Пользователь с таким логином или email уже существует';
    } else {
        $userId = registerUser($db, $login, $email, $password);
        loginUser($userId, $login);
        
        // Перенос сессионной корзины в БД (если есть)
    //     if (!empty($_SESSION['cart'])) {
    //         $pdo = $db->getPDO();
    //         foreach ($_SESSION['cart'] as $productId => $quantity) {
    //             $stmt = $pdo->prepare("INSERT INTO cart_items (user_id, product_id, quantity) 
    //                                    VALUES (?, ?, ?) 
    //                                    ON DUPLICATE KEY UPDATE quantity = quantity + ?");
    //             $stmt->execute([$userId, $productId, $quantity, $quantity]);
    //         }
    //         unset($_SESSION['cart']);
    //     }
        
    //     header('Location: profile.php');
    //     exit;
    }
}

$content = 'html/register';
require_once 'html/main.php';
?>