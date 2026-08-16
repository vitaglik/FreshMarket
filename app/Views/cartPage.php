<main>
    <div class="container breadcrumbs">Главная / Корзина</div>
    <section class="page-head">
        <div class="container">
            <h1>Корзина</h1>
        </div>
    </section>

    <section class="section" style="padding-top:0">
        <div class="container cart-grid">
            <div class="panel">
                <?php
                $summary_products = 0;
                $summary_price = 0;

                foreach ($productInfo as $key => $value) :
                    $ids = array_column($productInfo, 'name_prod' );
                    $productCounts = array_count_values($ids);
                    $multiItems = array_filter($productCounts, function($quantity) {
                    return $quantity;
                    });
                    ?>
                    <div class="cart-item" data-id="<?= $value['id'] ?>">
                        <div class="card-image  "
                             style="background-image: url('../public/img/<?= $value["main_img"] ?>'), linear-gradient(135deg, #eef5e7, #ddeec8)"></div>
                        <div>
                            <h3 class="name-prod"><?= $value['name_prod'] ?></h3>
                            <div><span class="cart-count-prod"><?= $value['prod_count'] ?></span> шт · Свежая поставка ·
                                Артикул <?= $value['article'] ?></div>
                            <div class="cart-actions">
                                <div class="qty" data-qty id="count-<?= $value['prod_count'] ?>">
                                    <button class="qty-btn data-qty-minus" data-qty-minus>-</button>
                                    <strong class="data-qty-value" data-qty-value><?= $value['prod_count'] ?></strong>
                                    <button class="qty-btn data-qty-plus" data-qty-plus>+</button>
                                </div>
                                <a href="javascript:void(0)" class="remove" id="<?= $value['id'] ?>">Удалить</a>
                            </div>
                        </div>
                        <strong style="font-size: 28px;">
                            <span class="price-id" data-base-price="<?= $value['price'] ?>"><?= $value['price'] ?></span>
                            ₴ /
                            <span class="total-price-id"><?= $value['price'] * $value['prod_count'] ?></span>
                            ₴
                        </strong>
                    </div>
                    <?php
                    $summary_products += 1;
                    $summary_price = $summary_price + ($value['price'] * $value['prod_count']);
                endforeach; ?>
            </div>

            <aside class="summary-card">
                <h3>Ваш заказ</h3>
                <div class="summary-row"><span>Товары</span><strong id="cart-count-prod" ><?= $summary_products ?></strong></div>
                <div class="summary-row"><span>Доставка</span><strong>Бесплатно</strong></div>
                <div class="summary-row summary-total"><span>Итого</span><strong class="cart-summary-price"><?= $summary_price ?></strong></div>
                <div style="display:grid;gap:12px;margin-top:18px">
                    <a class="btn" href="../checkout">Перейти к оформлению</a>
                    <a class="btn-ghost" href="../listing">Продолжить покупки</a>
                </div>
            </aside>
        </div>
    </section>
</main>