<main>
    <div class="container breadcrumbs">Главная / Корзина / Оформление заказа</div>
    <section class="page-head">
        <div class="container">
            <span class="badge">Шаг 2 из 2</span>
            <h1>Оформление заказа</h1>
        </div>
    </section>

    <section class="section" style="padding-top:0">
        <div class="container checkout-grid">
            <div class="form-card">
                <h3>Контактные данные</h3>
                <div class="form-grid">
                    <input class="input" id="firstNameId" placeholder="Имя">
                    <input class="input" id="lastNameId" placeholder="Фамилия">
                    <input class="input full" id="phoneNumberId" placeholder="Телефон">
                    <input class="input full" id="emailId" placeholder="Email">
                </div>

                <h3 style="margin-top:24px">Способ доставки</h3>
                <div class="radio-row" id="deliveryMethodId">
                    <?php
                    foreach ($deliveryMethod as $key => $value) { ?>
                        <label class="radio-card"><input type="radio" id="delivery_<?= $value['id'] ?>" name="delivery">
                            <span><strong><?= $value['delivery_name'] ?></strong><br><span
                                        class="muted"><?= $value['description_delivery'] ?></span></span></label>
                    <?php } ?>
                </div>

                <div class="form-grid" style="margin-top:14px">
                    <input class="input full" id="cityId" placeholder="Город">
                    <input class="input full" id="streetId" placeholder="Улица, дом, квартира">
                    <textarea class="textarea full" rows="4" id="descriptionForOrderId"
                              placeholder="Комментарий к заказу"></textarea>
                </div>

                <h3 style="margin-top:24px">Способ оплаты</h3>
                <div class="radio-row" id="paymentMethodId">
                    <?php foreach ($paymentMethod as $key => $value) { ?>
                        <label class="radio-card"><input type="radio" id="payment_<?= $value['id'] ?>" name="payment">
                            <span><strong><?= $value['payment_name'] ?></strong><br><span
                                        class="muted"><?= $value['description_payment'] ?></span></span></label>
                    <?php } ?>
                </div>

                <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:24px">
                    <a class="btn" id="confirmOrder">Подтвердить заказ</a>
                    <a class="btn-ghost" href="../cart">Назад в корзину</a>
                </div>
            </div>

            <aside class="summary-card">
                <h3>Состав заказа</h3>
                <?php
                $summary_price = 0;
                foreach ($productInfo as $key => $value) :?>
                    <div class="order-item">
                        <div class="order-icon"
                             style="background-image: url('../public/img/<?= $value["main_img"] ?>')"></div>
                        <div style="flex:1">
                            <strong><?= $value['name_prod'] ?></strong>
                            <div class="muted"><?= $value['prod_count'] ?> × <?= $value['price'] ?> ₴</div>
                        </div>
                        <strong><?= $value['price'] * $value['prod_count'] ?></strong>
                    </div>
                    <?php
                    $summary_price = $summary_price + ($value['price'] * $value['prod_count']);
                endforeach; ?>
                <div class="summary-row"><span>Промокод</span><strong id="promoId">SPRING15</strong></div>
                <div class="summary-row summary-total"><span>К оплате</span><strong><?= $summary_price ?>₴</strong>
                </div>
            </aside>
        </div>
    </section>
</main>
<div class="modal-overlay">
    <div class="modal">
        <button class="modal-close popup-close">&times;</button>

        <div class="modal-icon">🛒</div>

        <h2>Подтверждение заказа</h2>

        <p>
            Вы уверены, что хотите оформить заказ и перейти к оплате?
        </p>

        <p class="modal-note">
            После подтверждения заказ будет передан в обработку.
        </p>

        <button class="confirm-btn" >
            Да, я подтверждаю покупку
        </button>

        <button class="close-confirm-order-btn popup-close">
            Вернуться к оформлению
        </button>
    </div>
</div>