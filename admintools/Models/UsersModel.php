<?php

namespace admintools\Models;

use core\Database;

class UsersModel extends Database
{
    public static function getUsers() : array
    {
        return self::getJoin('users', [
            'select' => '*',
            'joins' => [
                [
                    'type' => 'LEFT',
                    'table' => 'roles AS r',
                    'on' => 'r.id = users.role',
                ]
            ]
        ]);
    }
}