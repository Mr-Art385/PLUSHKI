<?php
// src/Base.php

require_once __DIR__ . '/Config.php';
require_once __DIR__ . '/Database.php';

// Создаём глобальный объект для работы с БД
$db = Database::getDBO();

// Функция для страницы 404
function to404() {
    header('HTTP/1.0 404 Not Found');
    require_once __DIR__ . '/../html/404.php'; // показываем шаблон 404
    exit;
}
?>