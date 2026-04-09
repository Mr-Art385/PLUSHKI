<h1 class="chocolate-text mt-5">Напиши нам</h1>

<?php if (isset($_SESSION['flash_message'])): ?>
    <div class="alert alert-<?= $_SESSION['flash_type'] ?> alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['flash_message']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['flash_message'], $_SESSION['flash_type']); ?>
<?php endif; ?>

<div class="row">
    <div class="col-lg-6">
        <form class="d-grid gap-3" method="post">
            <input class="form-control form-control-lg" type="text" name="name" 
                   placeholder="Введите имя" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
            <input class="form-control form-control-lg" type="email" name="email" 
                   placeholder="Введите e-mail" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            <input class="form-control form-control-lg" type="text" name="subject" 
                   placeholder="Введите тему" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>" required>
            <textarea class="form-control form-control-lg" name="message" 
                      placeholder="Ваше сообщение" rows="5" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            <button class="btn chocolate mb-3" type="submit" name="submit">Отправить</button>
        </form>
    </div>
    <div class="col-lg-6 map">
        <script type="text/javascript" charset="utf-8" async
            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=...&width=100%&height=400&lang=ru_RU&scroll=true"></script>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-6 ms-auto chocolate-text">
        <p>Вы также можете с нами связаться:</p>
        <ul>
            <li><img class="sviaz-img" src="img/pin.png"> г. Москва, м. Автозаводская, ул. Мастеркова 1</li>
            <li><img class="sviaz-img" src="img/phone.png"> 8 916 820 44 97</li>
            <li><img class="sviaz-img" src="img/mail.png"> balmain@gmail.com</li>
        </ul>
        <p>Ежедневно с 09:00 до 22:00</p>
    </div>
</div>