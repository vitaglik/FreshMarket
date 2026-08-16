<?php

namespace app\Models;

use core\Database;
use PDO;


class ThanksModel extends Database
{
    public static function normalizeOrder(): array
    {
        $id = $_GET['order_id'] ?? null;
        $where = "orders.order_id=" . (int)$id;
        return self::getJoin('orders', [
            'select' => '*',
            'joins' => [
                ['type' => 'LEFT',
                    'table' => 'order_details AS o',
                    'on' => 'orders.order_id = o.id'
                ],
                [
                'type' => 'LEFT',
                'table' => 'cart AS c',
                'on' => 'orders.prod_id = c.id'
                ],
                [
                    'type' => 'LEFT',
                    'table' => 'products AS prod',
                    'on' => 'c.prod_id = prod.id'
                ],
                [
                    'type' => 'LEFT',
                    'table' => 'delivery_method AS d',
                    'on' => 'o.delivery_type = d.id'
                ],
                [
                    'type' => 'LEFT',
                    'table' => 'payment_method AS pay',
                    'on' => 'o.payment_type = pay.id'
                ]
        ],
            'where' => $where
         ]);
     }

    public function getOrderRelations($id)
    {

//         $where = "user = '" . session_id() . "'";
//         return self::getJoin('cart', [
//             'select' => 'cart.id, cart.prod_count, p.name_prod, p.price, p.main_img, p.article, cart.prod_id',
//             'joins' => [
//                 [
//                     'type' => 'LEFT',
//                     'table' => 'products AS p',
//                     'on' => 'p.id = cart.prod_id',
//                 ]
//             ],
//             'where' => $where,
//         ]);
    }
}
