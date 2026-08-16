<?php

namespace app\Controllers;

use app\Models\CheckoutModel;
use app\Models\CartModel;
use core\BaseController;
use helpers\MailTemplate;
use app\Service\MailService;
use core\Database;
use JetBrains\PhpStorm\NoReturn;

class CheckoutController extends BaseController
{
    public function getCheckout(): void
    {
        $data ['productInfo'] = CartModel::normalizeProduct();
        $data ['deliveryMethod'] = CheckoutModel::getDeliveryMethod();
        $data ['paymentMethod'] = CheckoutModel::getPaymentMethod();
        $title['title'] = "Check Out Page";

        $this->view('layouts/header', $title);
        $this->view('checkoutPage', $data);
        $this->view('layouts/footer');

    }

    // сохранение заказа
    public function sendCheckoutEmail(): void
    {
        $products = CartModel::normalizeProduct();

        // массив с данными из формы страницы чекаута
        $order = [
            'first_name' => htmlspecialchars(trim($_POST['first_name'])) ?? '',
            'last_name' => htmlspecialchars(trim($_POST['last_name'])) ?? '',
            'phone_number' => htmlspecialchars(trim($_POST['phone_number'])) ?? '',
            'email' => htmlspecialchars(trim($_POST['email'])) ?? '',
            'delivery_type' => htmlspecialchars(trim($_POST['delivery'])) ?? '',
            'city' => htmlspecialchars(trim($_POST['city'])) ?? '',
            'street' => htmlspecialchars(trim($_POST['street'])) ?? '',
            'payment_type' => htmlspecialchars(trim($_POST['payment'])) ?? '',
            'promo' => htmlspecialchars(trim($_POST['promo'])) ?? '',
            'description' => htmlspecialchars(trim($_POST['description_for_order'])) ?? '',
        ];

        $last_id = CheckoutModel::addOrderInTable($order, 'order_details');
        $order['last_id'] = $last_id;

        $order['products'] = $products;
        foreach ($products as $key => $product) {
            $arr['order_id'] = $last_id;
            $arr['prod_id'] = $product['id'];
            $arr['count'] = $product['prod_count'];

            CheckoutModel::addOrderInTable($arr, 'orders');
        }

        // отправка письма клиенту
        $mailService = new MailService();
        $clientHTML = MailTemplate::render('client_order', ['order' => $order]);
        $mailService->send($order['email'], 'Информация о заказе', $clientHTML);

        // отправка письма продавцу
        $ownerHTML = MailTemplate::render('owner_order', ['order' => $order]);
        $mailService->send('admin@mvc.loc', 'Информация о заказе', $ownerHTML);

        header('Content-Type: application/json');
        echo json_encode(['order_id' => $last_id]);
        exit;
    }

}