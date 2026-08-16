<?php

namespace app\Controllers;

use app\Models\ListingModel;
use app\Models\ProductsModel;
use core\BaseController;
use core\Database;

class ListingController extends BaseController
{

    public function getListing(): void
    {
        $data['filters'] = ListingModel::getFilters();
        $data['categories'] = ListingModel::getCategories();
        // коментарии потому что не до конца понял как мне лучше стоит делать с фильтрами сортировки по цене и т д
//        if ($_POST['filtered_list'] == 'filtered') {
//            $data['productInfo'] = ListingModel::getFilteredProducts();
//        }else{
            $data['productInfo'] = ListingModel::getProducts();
//        }
        $data['count_prods'] = ListingModel::getTotalProds();
        $title['title'] = 'Каталог товаров';

        $this->view('layouts/header', $title);
        $this->view('listingPage', $data);
        $this->view('layouts/footer');
    }

    public function filterListingGet(): void
    {
        $data['productInfo'] = ListingModel::getFilteredProducts([
            'filters' => $_GET['filters'] ?? [],
            'category' => $_GET['categories'] ?? [],
            'filter' => $_GET['filter'] ?? [],
            'price_min' => $_GET['price_min'] ?? null,
            'price_max' => $_GET['price_max'] ?? null,
            'find_name' => $_GET['find_name'] ?? null
            ]);

        $this->view('layouts/productsList', $data);
    }

    public function filterListingPost(): void
    {
        $data['productInfo'] = ListingModel::getFilteredProducts([
            'filters' => $_POST['filters'] ?? [],
            'category' => $_POST['categories'] ?? [],
            'filter' => $_POST['filter'] ?? [],
            'price_min' => $_POST['price_min'] ?? null,
            'price_max' => $_POST['price_max'] ?? null,
            'find_name' => $_POST['find_name'] ?? null

        ]);

        $this->view('layouts/productsList', $data);
    }

    public function getListingApi(): string
    {

        if (!empty($token = getallheaders()['Authorization'])) {
            $token = explode(' ', $token);
            $user = Database::getFetch('users', 'token', $token[1]);

            if (empty($user)) {
                return json_encode('Error Authorization.');
            }

            $data['productInfo'] = ListingModel::getProducts();

            return json_encode($data);
        } else {
            return  json_encode('Bad request.');
        }
    }
}