<?php

namespace admintools\Controllers;

use admintools\Models\AuthModel;
use admintools\Models\ProductsModel;
use core\BaseController;

class ProductsController extends BaseController
{
    public function __construct()
    {
        $this->Admin();
        //        $userId = $this->user();
    }
    public function getProduct(): void
    {

        $data['product_info'] = ProductsModel::getProducts();
        $data['categories_name'] = ProductsModel::getCategories();
        $data['title'] = 'Товары';
        $data['user'] = $_SESSION['user']['name'];

        $this->v_admin('layouts/header', $data);
        $this->v_admin('productsPage', $data);
        $this->v_admin('layouts/footer');
    }

    public function addProductManual(): void
    {
        $this->v_admin('addProduct');
    }

    public function getPrice()
    {

        if (!isset($_FILES['price'])) {
            throw new \Exception('Файл не передан');
        }

        if ($_FILES['price']['error'] !== UPLOAD_ERR_OK) {
            throw new \Exception('Ошибка загрузки файла: '.$_FILES['price']['error']);
        }

        $uploadDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'uploads';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $targetFile = $uploadDir . '/' . basename($_FILES['price']['name']);
        if (!move_uploaded_file($_FILES['price']['tmp_name'], $targetFile)) {
            throw new \Exception('Не удалось сохранить прайс');
        } else {
            // Файл успешно загружен на сервер
            // Открываем файл для чтения
            $fileHandle = fopen($targetFile, 'r');

            if ($fileHandle !== false) {
                // разбираем файл построчно
                while (($row = fgetcsv($fileHandle, 0, ';')) !== false) {
                    // запоминаем полностью данные и записываем в 1 массив
                    $allRows [] = $row;
                }
                foreach ($allRows as $row) {
                    if ($allRows[0] !== $row) {
                        $mapping = [
                            'Артикул'              => 'article',
                            'Название товара'      => 'name_prod',
                            'Цена (грн)'           => 'price',
                            'Количество на складе' => 'count_in_store',
                            'Категория'            => 'cat_id',
                            'Картинка'             => 'main_img',
                            'Популярный'           => 'is_popular'
                        ];
                        $a = array_combine($mapping, $row);
                        ProductsModel::insertInTable('products', $a);
                    }
                }
                // 3. Закрываем файл
                fclose($fileHandle);
            } else {
                echo "Не удалось открыть файл!";
            }

        }
    }
}