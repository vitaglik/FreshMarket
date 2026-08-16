<?php
$sum_prods = 0;
foreach ($orderInfo as $key => $value) {
    $a = $value['price'] * $value['prod_count'];
    $sum_prods += $a;
}
?>
<main class="thanks">
    <div class="container">
        <div class="thanks-card">
            <div class="success-icon">✓</div>
            <span class="badge">Заказ № <?= $orderInfo[0]['order_id'] ?></span>
            <h1 style="font-size:48px;margin:18px 0 12px">Спасибо за заказ!</h1>
            <p class="muted" style="font-size:18px;max-width:560px;margin:0 auto 24px">Ваш заказ успешно оформлен. Мы уже отправили подтверждение на email и передали заказ в сборку. Курьер свяжется с вами перед доставкой.</p>
            <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
                <a class="btn" href="..">Вернуться на главную</a>
                <a class="btn-ghost" href="../listing">Продолжить покупки</a>
            </div>
            <div class="grid-3" style="margin-top:28px;text-align:left">
                <div class="feature"><h3>Адрес</h3><p>Город <?= $orderInfo[0]['city'] ?> улица:<?= $orderInfo[0]['street']?></p></div>
                <div class="feature"><h3>Сумма</h3><?= $sum_prods ?> ₴</p></div>
                <div class="feature"><h3>Тип оплаты</h3><p><?= $orderInfo[0]['payment_name']?></p></div>
                <div class="feature"><h3>Тип доставки</h3><p><?= $orderInfo[0]['delivery_name']?></p></div>
            </div>
        </div>
    </div>
</main>