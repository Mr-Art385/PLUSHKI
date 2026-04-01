<h1 class="chocolate-text mt-5">Напиши нам</h1>
<div class="row">
    <div class="col-lg-6">
        <form class="d-grid gap-3" method="post">
            <input class="form-control form-control-lg" type="text" name="name" placeholder="Введите имя" required>
            <input class="form-control form-control-lg" type="email" name="email" placeholder="Введите e-mail" required>
            <input class="form-control form-control-lg" type="text" name="subject" placeholder="Введите тему" required>
            <textarea class="form-control form-control-lg" name="message" placeholder="Ваше сообщение" rows="5" required></textarea>
            <button class="btn chocolate mb-3" type="submit" name="submit">Отправить</button>
        </form>
        <?php if (isset($_POST['submit'])): ?>
            <div class="alert alert-success">
                Спасибо, <?= htmlspecialchars($_POST['name']) ?>! Сообщение отправлено.
            </div>
        <?php endif; ?>
    </div>
    <div class="col-lg-6 map">
        <script type="text/javascript" charset="utf-8" async
            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=..."></script>
    </div>
</div>

<div class="row">
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