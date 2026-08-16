<?php
$currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<aside class="sidebar">

    <a class="<?= $currentUri === '/admin/categories' ? 'active' : '' ?>" href="/admin/categories">Категории</a>

    <a class="<?= $currentUri === '/admin/products' ? 'active' : '' ?>" href="/admin/products">Товары</a>

    <a class="<?= $currentUri === '/admin/orders' ? 'active' : '' ?>" href="/admin/orders">Заказы</a>

    <a class="<?= $currentUri === '/admin/users' ? 'active' : '' ?>" href="/admin/users">Пользователи</a>

    <a class="logout" href="/admin">Выход</a>

</aside>