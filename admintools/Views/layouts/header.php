<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>FreshMart — <?= $title ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../public/css/admin.css" />
</head>
<body>

<header class="topbar">

    <div class="logo">

        <div class="logo-icon">F</div>

        <span>FreshMart</span>

    </div>

    <div class="page-title">
        Панель управления
    </div>

    <div class="top-right">

        <input type="text" placeholder="Поиск...">

        <div class="admin-user">
            <?= $user ?>
        </div>

    </div>

</header>

