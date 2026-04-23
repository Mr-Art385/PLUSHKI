<?php
require_once __DIR__ . '/src/Base.php';
logoutUser();
header('Location: index.php');
exit;
?>