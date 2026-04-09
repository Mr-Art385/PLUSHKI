<?php
require_once __DIR__ . '/src/Base.php';

$title = 'Контакты - PLUSHKI';

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    $errors = [];
    
    // Валидация
    if (empty($name)) {
        $errors[] = 'Введите имя';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Введите корректный email';
    }
    if (empty($subject)) {
        $errors[] = 'Введите тему';
    }
    if (empty($message)) {
        $errors[] = 'Введите сообщение';
    }
    
    if (empty($errors)) {
        // Сохраняем в базу данных
        $pdo = $db->getPDO();
        $sql = "INSERT INTO message (name, email, theme, description) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$name, $email, $subject, $message])) {
            $_SESSION['flash_message'] = "Спасибо, $name! Ваше сообщение отправлено.";
            $_SESSION['flash_type'] = 'success';
            // Очищаем форму (редирект на ту же страницу)
            header('Location: kontact.php');
            exit;
        } else {
            $_SESSION['flash_message'] = 'Ошибка при отправке. Попробуйте позже.';
            $_SESSION['flash_type'] = 'danger';
        }
    } else {
        $_SESSION['flash_message'] = implode('<br>', $errors);
        $_SESSION['flash_type'] = 'danger';
    }
}

$content = 'html/kontact';
require_once 'html/main.php';
?>