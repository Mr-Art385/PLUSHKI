<h1 class="chocolate-text mt-5 text-center">Вход</h1>
<div class="row justify-content-center">
    <div class="col-lg-5">
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post" class="d-grid gap-3">
            <input type="text" name="login" class="form-control form-control-lg" placeholder="Логин или Email" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>" required>
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Пароль" required>
            <button type="submit" name="login_submit" class="btn chocolate">Войти</button>
        </form>
        <p class="text-center mt-3">Нет аккаунта? <a href="register.php" class="chocolate-text">Зарегистрироваться</a></p>
    </div>
</div>