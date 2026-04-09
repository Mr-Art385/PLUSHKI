<?php if (isset($_SESSION['flash_message'])): ?>
    <div class="alert alert-<?= $_SESSION['flash_type'] ?> alert-dismissible fade show mt-3" role="alert">
        <?= htmlspecialchars($_SESSION['flash_message']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['flash_message'], $_SESSION['flash_type']); ?>
<?php endif; ?>

<h2 class="chocolate-text h1">Описание</h2>
<div class="row">
    <div class="col-lg-5">
        <a href="<?= htmlspecialchars($product['image']) ?>" id="a">
            <img class="rounded shadow card-img w-100" 
                 src="<?= htmlspecialchars($product['image']) ?>" 
                 alt="<?= htmlspecialchars($product['name']) ?>">
        </a>
    </div>

    <div class="col-lg-6 mx-auto ul-block">
        <h1 class="chocolate-text"><?= htmlspecialchars($product['name']) ?></h1>
        
        <div class="price-block shadow mt-4">
            <h2 class="chocolate-text h3">Характеристики</h2>
            <ul class="p-0 h5">
                <li><span class="chocolate-text">Состав:</span> <?= htmlspecialchars($product['composition']) ?></li>
                <li><span class="chocolate-text">Вес:</span> <?= $product['weight'] ?> г</li>
                <li><span class="chocolate-text">Калорийность:</span> <?= $product['calories'] ?> ккал/100г</li>
                <li><span class="chocolate-text">Срок годности:</span> <?= $product['shelf_life'] ?> часов</li>
                <li><span class="chocolate-text">Упаковка:</span> <?= htmlspecialchars($product['packaging']) ?></li>
            </ul>                        
        </div>

        <div class="price-block shadow mt-4">
            <form method="get" action="cart.php" class="d-flex flex-column gap-2">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <input type="hidden" name="return" value="product.php?id=<?= $product['id'] ?>">
                
                <div>
                    <span class="h2 me-3"><?= $product['price'] ?>₽</span>
                    цена по карте
                    <?php if ($product['old_price'] > 0): ?>
                        <br><s><?= $product['old_price'] ?>₽</s>
                    <?php endif; ?>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <label class="chocolate-text fw-bold">Количество:</label>
                    <input type="number" name="quantity" value="1" min="1" class="form-control w-25">
                </div>
                
                <button type="submit" class="btn chocolate w-75 mt-3">Купить</button>
            </form>
        </div>
    </div>
</div>

<div class="mt-4">
    <h2 class="chocolate-text">Подробное описание</h2>
    <p class="m-0 chocolate rounded p-3">
        <?= nl2br(htmlspecialchars($product['detailed_description'])) ?>
    </p>
</div>