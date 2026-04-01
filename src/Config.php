<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    define('DB_HOST', 'MySQL-8.4'); 
    define('DB_USER', 'root');     
    define('DB_PASSWORD', '');         
    define('DB_NAME', 'PLUSHKI');  
    define('DB_PREFIX', '');  

    // НАСТРОЙКИ ДЛЯ ВЫВОДА
    define('DATE_FORM', 'd.m.Y H:i:s');
    define('PRODUCTS_PER_PAGE', 6);     // сколько товаров на странице

    // Путь для автоматической загрузки классов
    set_include_path(get_include_path() . PATH_SEPARATOR . 'src');
    spl_autoload_register();            // автозагрузка классов
?>