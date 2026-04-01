<?php
require_once __DIR__ . '/src/Base.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    to404();
}

$product = $db->getRowById('products', $id);
if (!$product) {
    to404();
}

$title = $product['name'] . ' - PLUSHKI';
$content = 'html/product';

require_once 'html/main.php';
?>