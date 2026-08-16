<?php

namespace app\Controllers;

use app\models\ThanksModel;
use core\BaseController;
class ThanksController extends BaseController
{
    public function getSuccess() : void
        {
            $data['orderInfo'] = ThanksModel::normalizeOrder();
            $title['title'] = "Success Page";


            $this->view('layouts/header', $title);
            $this->view('tnxPage', $data);
            $this->view('layouts/footer');;
        }

}