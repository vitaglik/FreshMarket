<?php

namespace app\Controllers;

use app\Models\ProductsModel;
use core\BaseController;
use app\Models\HomeModel;

class HomeController extends BaseController
{
    public function index(): void
    {
        $title['title'] = 'Главная страница';
        $data['popularProductInfo'] = ProductsModel::fetchPopular();


        $this->view('layouts/header', $title);
        $this->view('homePage');
        $this->view('layouts/popularProducts', $data);
        $this->view('layouts/footer');
    }
}