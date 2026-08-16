<?php

namespace admintools\Controllers;

use admintools\Models\UsersModel;
use core\BaseController;

class UsersController extends BaseController
{
    public function __construct()
    {
        $this->Admin();
        //        $userId = $this->user();
    }
    public function list() : void
    {
        $data['users_info'] = UsersModel::getUsers();
        $data['title'] = 'Пользователи';
        $data['user'] = $_SESSION['user']['name'];

        $this->v_admin('layouts/header', $data);
        $this->v_admin('usersPage', $data);
        $this->v_admin('layouts/footer');
    }
}