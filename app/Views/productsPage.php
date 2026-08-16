<main>
    <div class="container breadcrumbs">Главная / Каталог / Фрукты / <?= $productInfo["name_prod"] ?></div>

    <section class="section">
        <div class="container product-layout" id="<?= $productInfo['id']?>">
            <div class="panel panel-pic">
                <div class="gallery">
                    <div class="thumbs" >

                        <?php
                        foreach ($productInfo['thumbs'] as $key => $value) {
                            if (isset($value['img'])) {
                                ?>
                                <div class="thumb"  style="width=100px;height: 100px;">
                                    <div class="thumb-img" data-full="../../public/<?= $value['img'] ?>"
                                         style="width:100%;
                                                 height:66%;
                                                 cursor:pointer;
                                                 background-image: url('../../public/img/<?= $value['img'];?>');
                                                 background-size: cover;
                                                 background-position: center;
                                                 linear-gradient(135deg, #eef5e7, #ddeec8)"></div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="product-shot">
                        <img  src="../../public/img/<?= $productInfo["main_img"] ?>" alt="Основное фото">
                    </div>
                </div>
            </div>

            <div class="panel product-info">
                <div class="pill-row">
                    <span class="pill">Хит продаж</span>
                    <span class="pill">Импорт</span>
                    <span class="pill">Свежая поставка</span>
                </div>
                <h1 class="product-title" ><?= $productInfo["name_prod"] ?></h1>
                <div class="product-meta">
                    <span class="product-article">Артикул: <?= $productInfo["article"] ?></b></span>
                    <span>★★★★★ 4.9</span>
                    <span>23 отзыва</span>
                </div>

                <div class="product-price" <?= $productInfo["price"] ?> ₴</div>
                <div class="stock">● В наличии — <?= $productInfo["count_in_store"] ?></div>

                <p class="muted" style="margin-top:18px"><?= $productInfo["description_variety"] ?></p>

                <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:22px">
                    <div class="qty"  data-qty>
                        <button class="qty-btn" data-qty-minus>-</button>
                        <strong data-qty-value id="product-count-id">1</strong>
                        <button class="qty-btn" data-qty-plus>+</button>
                    </div>
                    <a class="btn prod-btn" id="send-to-cart-btn-id" href="javascript:void(0)">Добавить в корзину</a>
                    <a class="btn-ghost " href="../listing">Назад в каталог</a>
                </div>

                <div class="info-tabs">
                    <div class="info-block">
                        <h3>Описание</h3>
                        <p class="muted"><?= $productInfo["description_main"] ?></p>
                    </div>
                    <div class="info-block">
                        <h3>Характеристики</h3>
                        <div class="spec-list">
                        <?php
                            foreach ($productInfo['chars'] as $key => $value) {
                                echo '<div class="spec-item"><span class="muted">' .$value["char_name"]. '</span><strong>' .$value["char_value"]. '</strong></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div id="cartPopup" class="popup-overlay">
    <div class="popup-content">
        <div class="popup-icon">✓</div>

        <h2>Товар добавлен в корзину</h2>
        <p>Вы успешно добавили «<?= $productInfo["name_prod"] ?>» в вашу корзину.</p>

        <div class="popup-buttons">
            <a id="closePopupBtn" class="btn-secondary" href="../listing">Продолжить покупки</a>
            <a href="/cart" class="btn-primary">Перейти в корзину</a>
        </div>
    </div>
</div>

