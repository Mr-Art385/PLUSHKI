<?php
require_once __DIR__ . '/src/Base.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$user = getCurrentUser($db);
$title = 'Профиль - ' . $user['login'];

$content = 'html/profile';
require_once 'html/main.php';
?>