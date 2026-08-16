<?php

namespace app\Controllers;

use app\Models\CartModel;
use core\BaseController;

class CartController extends BaseController
{
    public function getCart(): void
    {
        $data ['productInfo'] = CartModel::normalizeProduct();
        $title['title'] = "Cart Page";

        $this->view('layouts/header', $title);
        $this->view('cartPage', $data);
        $this->view('layouts/footer');

    }

    public function deleteFromCart(): void
    {
        parse_str(file_get_contents('php://input'), $data);

        CartModel::deleteProductFromTable([
            'id' => $data['prod_id']
        ]);
        $data['productInfo'] = CartModel::normalizeProduct();

        $this->view('cartPage', $data);
    }

    public function updateProductInCart(): void
    {
        parse_str(file_get_contents('php://input'), $data);
        $updateData = [
            'prod_count' => $data['new_qty']
        ];
        $productId = (int)$data['prod_id'];
        CartModel::updateInTable('cart_products', $updateData, $productId);

        $this->view('cartPage', $data);
    }
}