<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/resets.css?v=<?= filemtime('css/resets.css') ?>">
    <link rel="stylesheet" href="css/style-adm.css?v=<?= filemtime('css/style-adm.css') ?>">
<!-- filemtime() возвращает время последнего изменения файла. Браузер увидит новый параметр ?v=... только когда файл реально меняется, и загрузит актуальную версию. -->
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'PLUSHKI'; ?></title>
</head>
<body class="milk">
    <header class="chocolate">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="PLUSHKI"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a href="index.php" class="nav-link">Главная</a></li>
                            <li class="nav-item"><a href="katalog.php" class="nav-link">Каталог</a></li>
                            <li class="nav-item"><a href="kontact.php" class="nav-link">Контакты</a></li>
                            <li class="nav-item">
                                <a href="cart.php" class="nav-link position-relative">
                                    Корзина
                                    <?php $cartCount = getCartTotalCount(); if ($cartCount > 0): ?>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            <?= $cartCount ?>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="milk">
        <div class="container pt-4">
            <!-- СЮДА ПОДСТАВЛЯЕТСЯ СОДЕРЖИМОЕ КОНКРЕТНОЙ СТРАНИЦЫ -->
            <?php require_once $content . '.php'; ?>
        </div>
    </main>

    <footer class="footer chocolate mt-5">
        <div class="container">
            <p class="footer-p">©️Все права защищены</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>