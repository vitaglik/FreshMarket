<?php

namespace admintools\Controllers;

use admintools\Models\CategoryModel;
use admintools\Models\OrdersModel;
use core\BaseController;


class OrdersController extends BaseController
{
public function getOders() : void
{
    $data ['orderInfo'] = OrdersModel::getOrders();
    $data['title'] = "Заказы";
    $data['user'] = $_SESSION['user']['name'];

    $this->v_admin('layouts/header', $data);
    $this->v_admin('ordersPage', $data);
    $this->v_admin('layouts/footer');
}
}