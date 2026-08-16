<?php
namespace app\Models;

use core\Database;
use PDO;

class CheckoutModel extends Database
{
    public static function addOrderInTable (array $data, string $table) : int
    {
        return self::insertInTable($table, $data);
    }

    public static function getDeliveryMethod () : array
    {
        $stmt = self::getAll('delivery_method');
        return $stmt;
    }

    public static function getPaymentMethod () : array
    {
        $stmt = self::getAll('payment_method');
        return $stmt;
    }

}