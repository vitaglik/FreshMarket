<?php

namespace app\Models;

use core\Database;
use PDO;

class CartModel extends Database
{

    public static function normalizeProduct(): array
    {
        $where = "user = '" . session_id() . "'";
        return self::getJoin('cart', [
            'select' => 'cart.id, cart.prod_count, p.name_prod, p.price, p.main_img, p.article, cart.prod_id',
            'joins' => [
                [
                    'type' => 'LEFT',
                    'table' => 'products AS p',
                    'on' => 'p.id = cart.prod_id',
                ]
            ],
            'where' => $where,
        ]);
    }

    public static function deleteProductFromTable(array $data): array
    {

        if (empty($data)) {
            return ['message' => 'Error. All fields must be filled!'];
        } else {
            return self::deleteFromTable('cart', $data);
        }
    }
    public static function updateProductInCart(array $data): array
    {
        if (empty($data)) {
            return ['message' => 'Error. All fields must be filled!'];
        }else {
            return self::updateInTable('cart', $data);
        }
    }
}