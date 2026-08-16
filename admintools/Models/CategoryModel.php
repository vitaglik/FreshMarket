<?php

namespace admintools\Models;

use core\Database;
use PDO;
class CategoryModel extends Database
{
    public static function getCategory(): array
    {
        $stmt = self::getAll('categories_prod');
        return $stmt;
    }
    public static function deleteCategoryFromTable(array $data): array
    {

        if (empty($data)) {
            return ['message' => 'Error. All fields must be filled!'];
        } else {
            return self::deleteFromTable('categories_prod', $data);
        }
    }
}