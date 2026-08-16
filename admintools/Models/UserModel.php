<?php

namespace admintools\Models;

use core\Database;

class UserModel extends Database
{
    public static function getUsers(): array
    {
        $users = self::getAll('users');
        return $users;
    }

    public static function getUser(int $id): ?array
    {
        $user = self::getFetch('users', 'id', $id );

        return $user ?? null;
    }
}
