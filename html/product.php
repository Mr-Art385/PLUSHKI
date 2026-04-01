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
            <p class="m-0">
                <span class="h2 me-3"><?= $product['price'] ?>₽</span>
                цена по карте
            </p>
            <?php if ($product['old_price'] > 0): ?>
                <s><?= $product['old_price'] ?>₽</s>
            <?php endif; ?>
            <br>
            <a href="kontact.php" class="btn chocolate w-75 mt-3">Купить</a>
        </div>
    </div>
</div>

<div class="mt-4">
    <h2 class="chocolate-text">Подробное описание</h2>
    <p class="m-0 chocolate rounded p-3">
        <?= nl2br(htmlspecialchars($product['detailed_description'])) ?>
    </p>
</div>