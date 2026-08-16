<?php

namespace admintools\Controllers;

use admintools\Models\AuthModel;
use admintools\Models\UserModel;
use core\BaseController;

class AuthController extends BaseController
{

    /**
     * Начало слоя проверки авторизации
     */

    public static function checkAuth(): bool
    {
        return !empty($_SESSION['user']);
    }

    public static function userSession(): ?array
    {

        return $_SESSION['user'] ?? null;
    }

    public function userId(): ?array
    {
        if (!self::checkAuth()) {
            return null;
        }

        return $_SESSION['user']['id'];
//        return UserModel::getUser((int)self::userSession()) ?? null;
    }

    public static function requireAuth(): void
    {
        if (!self::checkAuth()) {
            header('Location: /admin');
            exit;
        }
    }

public static function requireAdmin(): void
{
    self::requireAuth();

//    $user = UserModel::getUser((int) self::userSession());
    $user = self::userSession();
    if (!$user || (int)$user['role'] !== 1 && (int)$user['role'] !== 2) {
        header('Location: /admin');
        exit;
    }
}

    /**
     * конец проверки
     */


    public function index(): void
    {
        $data['title'] = 'Admin Panel';
        $data['user'] = 'Log in';

        $this->v_admin('layouts/header', $data);
        $this->v_admin('login');
        $this->v_admin('layouts/footer');
    }

    public function login(): void
    {
        $login = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;
        $data['title'] = 'Admin Panel';
        $data['user'] = 'Неизвестно';

        if (empty($login) || empty($password)) {

            $data['error'] = 'Логин и пароль обязательны к заполнению';
            $this->v_admin('layouts/header', $data);
            $this->v_admin('adminPage', $data);
            $this->v_admin('layouts/footer');
        } else {
            $user = AuthModel::login($login, $password);
        }

        if (empty($user) ) {
            $data['error'] = 'Логин или пароль неверны';
            $this->v_admin('layouts/header', $data);
            $this->v_admin('adminPage', $data);
            $this->v_admin('layouts/footer');
        }
        $_SESSION['user'] = $user[0];
        $data['user'] = $_SESSION['user']['name'];

        $this->v_admin('layouts/header', $data);
        $this->v_admin('adminPage', $data);
        $this->v_admin('layouts/footer');
    }
}