<?php
require_once __DIR__ . '/src/Base.php';

$title = 'Каталог - PLUSHKI';
$content = 'html/katalog';

// Получаем все активные товары из БД, сортируем по имени
$products = $db->getRows('products', '', [], 'name');

require_once 'html/main.php';
?>