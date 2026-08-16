<?php

namespace admintools\Models;

use core\Database;
use PDO;

class ProductsModel extends Database
{
    public static function getProducts(): array
    {
        $stmt = self::getJoin('products', [
            'select' => 'products.*, cp.id AS category_id, cp.cat_name',
            'joins' => [
                [
                    'type' => 'LEFT',
                    'table' => 'categories_prod AS cp',
                    'on' => 'cp.id = products.cat_id'
                ]
            ]
        ]);
        return $stmt;
    }
    public static function getCategories(): array
    {
        $stmt = self::getAll('categories_prod');
        return $stmt;
    }
}