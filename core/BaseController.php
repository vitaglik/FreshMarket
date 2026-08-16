<?php

namespace core;

use admintools\Controllers\AuthController as Auth;


class BaseController
{
    /**
     * Начало слоя проверки авторизации
     */
    protected function auth(): void
    {
        Auth::requireAuth();
    }

    protected function Admin(): void
    {
        Auth::requireAdmin();
    }

    protected function user(): ?array
    {
        return Auth::userSession();
    }

    protected function userId(): ?array
    {
        return (new \admintools\Controllers\AuthController)->userId() ?? null;
    }
    /**
     * конец проверки
     */

    protected function view(string $view, array $data = []): void
    {
        extract($data);

        require_once __DIR__ . '/../app/Views/' . $view . '.php';
    }

    protected function v_admin(string $view, array $data = []): void
    {
        extract($data);

        require_once __DIR__ . '/../admintools/Views/' . $view . '.php';
    }
}