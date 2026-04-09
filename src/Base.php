<?php
require_once __DIR__ . '/Config.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/CartHelper.php';

// глобальный объект для работы с БД
$db = Database::getDBO();

function to404() {
    header('HTTP/1.0 404 Not Found');
    require_once __DIR__ . '/../html/404.php'; 
    exit;
}
?>