<?php

namespace app\Models;

use core\Database;
use PDO;

class ListingModel extends Database
{
    public static function getProducts(): array
    {
        $stmt = self::getAll('products');
        return $stmt;
    }

    public static function getTotalProds(): int
    {
        $stmt = self::getLastElement('products', 'id');
        return $stmt;
    }

    public static function getFilters(): array
    {
        $stmt = self::getAll('filters');
        return $stmt;
    }

    public static function getCategories(): array
    {
        $stmt = self::getAll('categories_prod');
        return $stmt;
    }

    public static function getFilteredProducts(array $params = []): array
    {
        $where = [];
        $bind = [];
        $a = [];

        if (
            empty($params['filters'])
            && empty($params['category'])
            && empty($params['filter'])
            && empty($params['price_min'])
            && empty($params['price_max'])
            && empty($params['find_name'])
        ) {
            return self::getProducts();
        }

        if (!empty($params['filters'])) {
            $placeholder = [];

            /**
             * Массив фильтров будет выглядеть примерно так -
             * [
             *      0 => 12,
             *      1 => 15,
             *      2 => 18,
             * ],
             * где 12, 15, 18 - это айди фильтров и базы
             */

            foreach ($params['filters'] as $key => $filter) {
                $param = ":filter_" . $key;
                $placeholder[] = $param;
                $bind[$param] = $filter;
            }
            /**
             * как это говно будет выглядеть после того, как отработает - filters.id IN (:filter_0, :filter_1, :filter_2)
             */
            $where[] = "filters.id IN (" . implode(',', $placeholder) . ")";
        }

        if (!empty($params['category'])) {
            $placeholder = [];

            foreach ($params['category'] as $key => $category) {
                $param = ":category_" . $key;
                $placeholder[] = $param;
                $bind[$param] = $category;
            }

            $where[] = "categories_prod.id IN (" . implode(',', $placeholder) . ")";

        }

        if (!empty($params['filter'])) {
            foreach ($params['filter'] as  $category) {

                if ($category == 'popular') {

                    $a[] = "products.is_popular = 1";
                }

                elseif ($category == 'new') {
                    $a[] = "products.new = 1";
                }

                elseif ($category == 'promotions') {
                    $a[] = "products.promotions = 1";
                }
            }
        }


        if (!empty($params['price_min'])) {
            $where[] = "products.price >= :price_min";
            $bind[':price_min'] = $params['price_min'];
        }

        if (!empty($params['price_max'])) {
            $where[] = "products.price <= :price_max";
            $bind[':price_max'] = $params['price_max'];
        }

        if (!empty($params['find_name'])) {
            $where[] = "name_prod LIKE :find_name";
            $bind[':find_name'] = "%{$params['find_name']}%";

        }

        $where = implode(' AND ', $where );

        if (!empty($a)) {
            $a  = implode(' OR ', $a);

            if(!empty($where)){
                $where = $where . ' AND ' .  $a;
            } else{
                $where = $where . $a;
            }
        }

        return self::getJoin('products', [
            'select' => 'DISTINCT products.*',
            'joins' => [
                [
                    'type' => 'LEFT',
                    'table' => 'filters_product',
                    'on' => 'products.id = filters_product.prod_id',
                ],
                [
                    'type' => 'LEFT',
                    'table' => 'filters',
                    'on' => 'filters_product.filter_id = filters.id',
                ],
                [
                    'type' => 'LEFT',
                    'table' => 'categories_prod',
                    'on' => 'products.cat_id = categories_prod.id',
                ]
            ],
            'where' => $where,
            'params' => $bind
        ]);
    }
}
