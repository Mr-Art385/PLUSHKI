<h1 class="chocolate-text ps-2 mb-4">Корзина</h1>

<?php if (empty($cartItems)): ?>
    <div class="alert alert-info text-center" style="background-color: #f4d0a9; border-color: #512f0a; color: #512f0a;">
        Ваша корзина пуста. <a href="katalog.php" class="chocolate-text fw-bold">Перейти в каталог</a>
    </div>
<?php else: ?>
    <form method="post">
        <input type="hidden" name="update_cart" value="1">
        <div class="table-responsive">
            <table class="table align-middle bg-white rounded overflow-hidden shadow-sm cart-table">
                <thead class="chocolate text-white">
                    <tr>
                        <th style="width: 50px" class="text-center"></th>
                        <th class="text-start">Товар</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Количество</th>
                        <th class="text-center">Сумма</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): 
                        $product = $item['product'];
                    ?>
                        <tr class="align-middle">
                            <td class="text-center">
                                <a href="cart.php?action=remove&id=<?= $product['id'] ?>" 
                                class="text-danger fw-bold text-decoration-none"
                                onclick="return confirm('Удалить товар?')"
                                style="font-size: 1.8rem;">&times;</a>
                            </td>
                            <td class="text-start">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="<?= htmlspecialchars($product['image']) ?>" width="60" height="60" style="object-fit:cover" class="rounded">
                                    <a href="product.php?id=<?= $product['id'] ?>" class="chocolate-text fw-bold text-decoration-none">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </a>
                                </div>
                            </td>
                            <td class="text-center fw-bold"><?= $product['price'] ?> ₽</td>
                            <td class="text-center" style="width: 120px">
                                <input type="number" name="quantity[<?= $product['id'] ?>]" 
                                    value="<?= $item['quantity'] ?>" min="1" 
                                    class="form-control text-center" onchange="this.form.submit()">
                            </td>
                            <td class="text-center fw-bold chocolate-text"><?= $item['subtotal'] ?> ₽</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="chocolate text-white">
                    <tr>
                        <td colspan="4" class="text-end fw-bold h5">Итого:</td>
                        <td class="text-center fw-bold h5"><?= $totalSum ?> ₽</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <a href="kontact.php" class="btn chocolate">Оформить заказ</a>
        </div>
    </form>
<?php endif; ?>