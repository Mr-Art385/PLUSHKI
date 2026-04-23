<h1 class="chocolate-text mt-5 text-center">Регистрация</h1>
<div class="row justify-content-center">
    <div class="col-lg-5">
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post" class="d-grid gap-3">
            <input type="text" name="login" class="form-control form-control-lg" placeholder="Логин" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>" required>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Пароль (минимум 6 символов)" required>
            <input type="password" name="confirm" class="form-control form-control-lg" placeholder="Повторите пароль" required>
            <button type="submit" name="register" class="btn chocolate">Зарегистрироваться</button>
        </form>
        <p class="text-center mt-3">Уже есть аккаунт? <a href="login.php" class="chocolate-text">Войти</a></p>
    </div>
</div>