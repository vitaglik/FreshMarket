
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FreshMart — <?= $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/styles.css" />
    <link rel="icon" type="image/png" href="../../../public/img/favicon.png">
</head>
<body>

<header class="site-header">
    <div class="container header-row">
        <a class="logo" href="index.html">
            <span class="logo-mark">F</span>
            <span>FreshMart</span>
        </a>

        <button class="icon-btn mobile-menu-btn" data-menu-btn aria-label="Открыть меню">
            ☰
        </button>

        <nav class="nav" data-nav>
            <a href="..">Главная</a>
            <a href="../listing">Каталог</a>
            <a href="../cart">Корзина</a>
        </nav>

        <div class="header-actions">
            <div class="search">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.3-4.3m1.3-5.2a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                <input type="text" id="nameInput" placeholder="Поиск фруктов, овощей, молочки..." />
            </div>
            <a class="icon-btn" href="../cart" aria-label="Корзина">🛒 Корзина</a>
        </div>
    </div>
</header>

