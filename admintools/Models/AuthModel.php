<?php

namespace admintools\Models;

use core\Database;

class AuthModel extends Database
{
    public static function login(string $login, string $pass): array
    {
        return self::getAll('users', 'login = :login AND pass = :pass', ['login' => $login, 'pass' => $pass]);
    }
}