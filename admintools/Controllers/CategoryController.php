<?php

namespace admintools\Controllers;

use admintools\Models\AuthModel;
use admintools\Models\CategoryModel;
use core\BaseController;

class CategoryController extends BaseController
{
//    public function __construct()
//    {
//       $this->Admin();
//       //        $userId = $this->user();
//    }
    public function list(): void
    {

        $data['categories'] = categoryModel::getCategory();
        $data['title'] = 'Категории';
        $data['user'] = $_SESSION['user']['name'];

        $this->v_admin('layouts/header', $data);
        $this->v_admin('categoryPage', $data);
        $this->v_admin('layouts/footer');
    }
    public function editCategory(): void
    {
        parse_str(file_get_contents('php://input'), $data);
        $updateData = [
            'cat_name' => $data['cat_name']
        ];
        if(isset($data['cat_id'])){
            $productId = (int)$data['cat_id'];
            CategoryModel::updateInTable('categories_prod', $updateData, $productId);
        }else{
            CategoryModel::insertInTable('categories_prod', $updateData);
        }

        $this->v_admin('categoryPage', $data);
    }
    public function deleteCategory(): void
    {
        parse_str(file_get_contents('php://input'), $data);

        CategoryModel::deleteCategoryFromTable([
            'id' => $data['cat_id']
        ]);

        $this->v_admin('categoryPage', $data);
    }
}