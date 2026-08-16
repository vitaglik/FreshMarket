<?php

namespace admintools\Models;

use core\Database;
use PDO;

class OrdersModel extends Database
{
    public static function getOrders() : array
    {
        return self::getJoin('orders', [
            'select' => 'orders.id AS main_id, orders.count, orders.order_id, orders.prod_id, OD.*, P.name_prod, P.price, P.main_img',
            'joins' => [
                [
                    'type' => 'LEFT',
                    'table' => 'order_details AS OD',
                    'on' => 'OD.id = orders.order_id',
                ],
                [
                    'type' => 'LEFT',
                    'table' => 'products AS P',
                    'on' => 'P.id = orders.prod_id',
                ]
            ]
        ]);
    }
}