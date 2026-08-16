<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php

?>
<h2>Спасибо за заказ!</h2>

<p>
    Здравствуйте, <?= htmlspecialchars($order['first_name']) ?>.
</p>

<p>
    Ваш заказ успешно оформлен.
</p>

<p>
    Номер заказа: <b>#<?= htmlspecialchars($order['last_id']) ?></b>
</p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Товар</th>
        <th>Количество</th>
        <th>Цена</th>
    </tr>

    <?php foreach ($order['products'] as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['name_prod']) ?></td>
            <td><?= $product['prod_count'] ?></td>
            <td><?= $product['price'] ?> грн</td>
        </tr>
    <?php endforeach; ?>

</table>

<p>
    Спасибо за покупку!
</p>

</body>
</html>
