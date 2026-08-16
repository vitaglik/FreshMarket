<?php
if (isset($error)) {?>
    <main class="login-wrapper">
    <div class="login-card">
        <div class="icon">
            <img src="../../public/img/leaf.png" alt="">
        </div>
        <h2><?php echo $error; ?></h2>
        <p>Попробуйте авторизироваться снова</p>
        <a href='/admin' class="re-login-btn">Вернуться к авторизации</a>
    </div>
</main>
    <?php die;
}
?>
<div class="layout">

    <?php
    require_once __DIR__ . '/../../admintools/Views/layouts/sidebar.php' ?>

    <main class="content">

        <section class="welcome">

            <div>
                <h2>Добро пожаловать <?= $user ?> 👋</h2>
                <p>
                    Вы попали в админ панель.
                </p>
            </div>

        </section>



    </main>

</div>