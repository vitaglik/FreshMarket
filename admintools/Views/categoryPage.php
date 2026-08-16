<div class="layout">

    <?php require_once __DIR__ . '/../../admintools/Views/layouts/sidebar.php' ?>

    <main class="content">
        <section class="welcome">

            <div>
                <p>
                    Здесь вы можете управлять
                    категориями .
                </p>
            </div>

        </section>

        <div class="filter-list">
            <div class="card-header">
                <h3 style="margin-top:22px">Категории</h3>
                <button class="btn-new" onclick="newObject()">+ Добавить категорию</button>
            </div>

            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Категория</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody >
                <?php
                foreach ($categories as $key => $value) { ?>
                    <tr id="<?= $value['id'] ?>">
                        <td><?= $value['id'] ?></td>
                        <td class="cat-name">
                            <?= $value['cat_name'] ?>
                        </td>
                        <td class="actions">
                            <button class="btn-edit" onclick="editCategory(<?= $value['id'] ?>)">Edit</button>
                            <button class="btn-save" onclick="saveCategory(<?= $value['id'] ?>)">Save</button>
                            <button class="btn-delete" onclick="deleteCategory(<?= $value['id'] ?>)">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
<div class="modal-overlay">
    <div class="modal">

        <h2>✏️ Редактирование категории</h2>

        <label>Новое название категории</label>
        <div class="input">
            <input type="text" id="categoryName" value="" placeholder="Введите новое название">
        </div>


        <div class="buttons">
            <button class="cancel" onclick="cancelBtn()">Отмена</button>
            <button class="save" onclick="saveBtn()">Сохранить</button>
        </div>

    </div>
</div>