<h1 class="chocolate ps-2">КАТАЛОГ</h1>

<?php if (empty($products)): ?>
    <p class="alert alert-info">Товары временно отсутствуют</p>
<?php else: ?>
    <?php
    // Разбиваем массив товаров на группы по 3 в строке
    $chunks = array_chunk($products, 3);
    foreach ($chunks as $chunk):
    ?>
        <div class="row px-2 mt-5">
            <?php foreach ($chunk as $product): ?>
                <div class="card col-lg-3 p-0 mb-5 shadow mx-auto">
                    <img class="card-img-top" src="<?= htmlspecialchars($product['image']) ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="card-body">
                        <a class="text-decoration-none card-text" href="product.php?id=<?= $product['id'] ?>">
                            <?= htmlspecialchars($product['name']) ?>
                        </a>
                        <h2 class="card-title h1"><?= $product['price'] ?>₽</h2>
                        <?php if ($product['old_price'] > 0): ?>
                            <s class="text-muted"><?= $product['old_price'] ?>₽</s>
                        <?php endif; ?>
                        <a href="product.php?id=<?= $product['id'] ?>" class="btn chocolate w-100 mt-2">Перейти к товару</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>