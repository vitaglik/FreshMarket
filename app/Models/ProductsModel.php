<?php

namespace app\Models;

use core\Database;
use PDO;

class ProductsModel extends Database
{
    public static function getProducts(): array
    {
        $stmt = self::getAll('products');
        return $stmt;
    }

    public static function getProduct(int $id): array
    {
        $stmt = self::getFetch('products', 'id', $id );

        return $stmt;

    }

    public static function getProductChars(int $id): array
    {
        // Выполняем универсальный JOIN-запрос
        $result = self::getJoin('characteristics', [

            // Основная таблица characteristics будет использоваться с алиасом C
            'alias' => 'C',

            // Какие поля выбирать
            // '*' = выбрать все поля из всех таблиц
            'select' => '*',

            // Список JOIN-ов
            'joins' => [

                [
                    // Тип соединения таблиц
                    // LEFT JOIN = даже если связи нет, строка из characteristics все равно вернется
                    'type' => 'LEFT',

                    // Таблица для соединения
                    'table' => 'characteristics_name',

                    // Короткий псевдоним таблицы
                    'alias' => 'CN',

                    // Условие соединения таблиц
                    // characteristics_name.name_id = characteristics.name_id
                    'on' => 'CN.name_id = C.name_id',
                ],

                [
                    // Второй LEFT JOIN
                    'type' => 'LEFT',

                    // Таблица со значениями характеристик
                    'table' => 'characteristics_value',

                    // Алиас таблицы
                    'alias' => 'CV',

                    // Связываем value_id между таблицами
                    'on' => 'CV.value_id = C.value_id',
                ],
            ],

            // WHERE условие
            // Ищем характеристики только конкретного товара
            'where' => 'C.prod_id = :prod_id',

            // Параметры для prepared statement
            // :prod_id будет безопасно заменен на значение $id
            'params' => [
                'prod_id' => $id,
            ],
        ]);

        // Возвращаем результат запроса
        return $result;
    }

    public static function getThumbs($id): array
    {
        $result = self::getJoin('products', [
            'alias' => 'P',
            'select' => '*',

            'joins' => [
                [
                    'type' => 'LEFT',
                    'table' => 'img',
                    'alias' => 'I',
                    'on' => 'I.prod_id = P.id',
                ]
            ],

            'where' => 'P.id = :prod_id',
            'params' => [
                'prod_id' => $id
            ],
        ]);

        return $result;
    }

    public static function fetchPopular(): array
    {
        $stmt = Database::getFetch('products', 'is_popular', 1, 4 );
        return $stmt;
    }
    public static function addProductToCart(array $params = []) : array|int
    {
        if (empty($params)) {
            return ['message' => 'Error. All fields must be filled!'];
        } else {
            $rowCount = self::getRow('cart', [
                'params' => [
                    'prod_id' => $params['prod_id'],
                    'user' => $params['user']
                ],
                'select' => '`id`, `prod_count`',
                'where' => 'user = :user AND prod_id = :prod_id GROUP BY `id`'
            ]);
            $old_count = $rowCount['prod_count'] ?? 0;
            if ($rowCount !== false && $old_count > 0) {
                $added_count = $params['prod_count'];
                $new_count = $old_count + $added_count;
                $params ['prod_count'] = $new_count;
                $params ['id'] = $rowCount['id'];
                return self::updateInTable('cart', $params);
            }else{
                return self::insertInTable('cart', $params);
            }

        }
    }
}