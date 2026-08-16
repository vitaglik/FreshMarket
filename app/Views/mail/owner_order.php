<?php
//if (!empty($order)) {
//    extract($order[0]);
//}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>

<h2>Новый заказ</h2>

<p>
    Заказ № <?= htmlspecialchars($order['last_id']) ?>
</p>

<p>
    Клиент: <?= htmlspecialchars($order['first_name']).' '.htmlspecialchars($order['last_name']) ?>
</p>

<p>
    Телефон: <?= htmlspecialchars($order['phone_number']) ?>
</p>

<p>
    Email: <?= htmlspecialchars($order['email']) ?>
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

</body>
</html>
