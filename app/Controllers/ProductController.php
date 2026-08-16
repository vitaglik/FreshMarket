<?php

namespace app\Controllers;

use app\Models\ProductsModel;
use core\BaseController;

class ProductController extends BaseController
{
    public function getProduct(int $id): void
    {
        $data['productInfo'] = ProductsModel::getProduct($id);
        $data['productInfo']['chars'] = ProductsModel::getProductChars($id);
        $data['productInfo']['thumbs'] = ProductsModel::getThumbs($id); // подключили картинки отдельным запросом и это не надо в дальнейшем так делать! Просто для примера с джойнами
        $data['popularProductInfo'] = ProductsModel::fetchPopular();

        $title['title'] = $data['productInfo']['name_prod'];

        $this->view('layouts/header', $title);
        $this->view('productsPage', $data);
        $this->view('layouts/popularProducts', $data);
        $this->view('layouts/footer');

    }

    public function addToCart(): void
    {

        $data['productInfo'] = ProductsModel::addProductToCart([
            'prod_id' => $_POST['prod_id'],
            'prod_count' => $_POST['prod_count'],
            'user' => session_id()
        ]);

        $this->view('cartPage', $data);

    }

    public function getProductApi(int $id): string
    {
        $data['productInfo'] = ProductsModel::getProduct($id);
        $data['productInfo']['chars'] = ProductsModel::getProductChars($id);
        $data['productInfo']['thumbs'] = ProductsModel::getThumbs($id); // подключили картинки отдельным запросом и это не надо в дальнейшем так делать! Просто для примера с джойнами

        return json_encode($data, JSON_UNESCAPED_UNICODE);

    }
}