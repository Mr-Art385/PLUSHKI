<h1 class="chocolate-text">Профиль пользователя</h1>
<div class="card shadow-sm p-4">
    <p><strong>Логин:</strong> <?= htmlspecialchars($user['login']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
    <p><strong>Дата регистрации:</strong> <?= date('d.m.Y H:i', strtotime($user['created_at'])) ?></p>
    <a href="logout.php" class="btn btn-danger mt-3">Выйти</a>
</div>