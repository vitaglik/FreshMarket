<main class="login-wrapper">
    <div class="login-card">
        <div class="icon">
            <img src="../../public/img/leaf.png" alt="">
        </div>
        <h2>Вход в панель управления</h2>
        <p>Авторизуйтесь для управления магазином FreshMart</p>
        <form action="/admin/login" method="post">
            <div class="form-group">
                <label>Username</label>
                <div class="input">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="text" name="username" placeholder="Enter username">
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Enter password">
<!--                    <button type="submit" class="show-password"><i class="fa-regular fa-eye"></i></button>-->
                </div>
            </div>
            <div class="login-options">
                <label><input type="checkbox">Запомнить меня</label>
                <a href="#">Забыли пароль?</a>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</main>