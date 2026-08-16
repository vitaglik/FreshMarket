<div class="layout">

    <?php

    require_once __DIR__ . '/../../admintools/Views/layouts/sidebar.php' ?>

    <main class="content">

        <section class="welcome">
            <div>
                <p>
                    Здесь вы можете управлять товарами.
                </p>
            </div>
        </section>
        <section class="card">
            <div class="card-header">
                <h2>Товары</h2>
                <form action="/admin/products" method="post" enctype="multipart/form-data">
                    <!-- Без multipart/form-data работать не будет!!!! -->
                    <input type="file" name="price">
                    <button type="submit" class="upload-btn">⬆ Загрузить</button>
                </form>
                <button class="btn-new" onclick="newObject()">+ Добавить товар</button>
            </div>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Картинка</th>
                    <th>Количество</th>
                    <th>Артикул</th>
                    <th>Категория</th>
                    <th>Описание</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($product_info as $key => $product) :
                    ?>
                    <tr class="prodId-<?= $product['id'] ?>">
                        <td><?= $product['id'] ?></td>
                        <td class="name-prod"><?= $product['name_prod'] ?></td>
                        <td class="price-prod"><?= $product['price'] ?></td>
                        <td style="width: 80px; height: 80px; padding: 5px;">
                            <img class="img-prod" src="../../public/img/<?= $product['main_img'] ?>" alt="product"
                                 style="width: 100%; height: 100%; object-fit: contain; border-radius: 4px;">
                        </td>
                        <td class="count-in-store-prod"><?= $product['count_in_store'] ?></td>
                        <td class="article-prod"><?= $product['article'] ?></td>
                        <td class="category-prod"><?= $product['cat_name'] ?></td>
                        <!--                        <td class="description-prod">-->
                        <?php //= $product['description_main'] ?><!--</td>-->
                        <td class="actions">
                            <button class="btn-edit" onclick="editProduct(<?= $product['id'] ?>)">Edit</button>
                            <button class="btn-delete" onclick="deleteProduct(<?= $product['id'] ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</div>
<div class="product-edit-modal-overlay" id="productEditModal">

    <div class="product-edit-modal">

        <div class="product-edit-modal-header">
            <h2 class="product-edit-modal-title">
                Редактирование товара
            </h2>

            <button class="product-edit-modal-close">
                &times;
            </button>
        </div>

        <div class="product-edit-modal-body">

            <div class="product-edit-image-section">

                <img
                        src=""
                        alt="Авокадо"
                        class="product-edit-image edit-img"
                >

                <div class="product-edit-group" style="margin-top:15px;">
                    <label class="product-edit-label">
                        Изображение товара
                    </label>

                    <input
                            type="file"
                            class="product-edit-input"
                    >
                </div>

            </div>

            <div class="product-edit-form">

                <div class="product-edit-group">
                    <label class="product-edit-label">
                    </label>

                    <input
                            type="text"
                            value=""
                            class="product-edit-input edit-name"
                    >
                </div>

                <div class="product-edit-group">
                    <label class="product-edit-label">
                        Цена
                    </label>

                    <input
                            type="number"
                            step="0.01"
                            value=""
                            class="product-edit-input edit-price"
                    >
                </div>

                <div class="product-edit-group">
                    <label class="product-edit-label">
                        Количество на складе
                    </label>

                    <input
                            type="number"
                            value=""
                            class="product-edit-input edit-count"
                    >
                </div>

                <div class="product-edit-group">
                    <label class="product-edit-label">
                        Артикул
                    </label>

                    <input
                            type="text"
                            value=""
                            class="product-edit-input edit-article"
                    >
                </div>

                <div class="product-edit-group">
                    <label class="product-edit-label">
                        Категория
                    </label>
                    <select class="product-edit-input">
                        <?php foreach ($categories_name as $category) : ?>
                            <option class="edit-category"><?= $category['cat_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="product-edit-group">
                    <label class="product-edit-label">
                        Описание
                    </label>

                    <textarea class="product-edit-textarea">

                    </textarea>
                </div>

            </div>

        </div>

        <div class="product-edit-footer">

            <button class="product-edit-cancel-btn ">
                Отмена
            </button>

            <button class="product-edit-save-btn" onclick="saveProduct(<?= $product['id'] ?>)">
                Сохранить изменения
            </button>

        </div>

    </div>

</div>