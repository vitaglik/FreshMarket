<div class="layout">

    <?php require_once __DIR__ . '/../../admintools/Views/layouts/sidebar.php' ?>

    <main class="content">
        <section class="welcome">

            <div>
                <p>
                    Здесь вы можете управлять
                    пользователями .
                </p>
            </div>

        </section>

        <div class="filter-list">
            <div class="card-header">
                <h3 style="margin-top:22px">Пользователи</h3>
                <button class="btn-new" onclick="newUser()">+ Добавить пользователя</button>
            </div>

            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody >
                <?php
                foreach ($users_info as $key => $user) { ?>
                    <tr id="<?= $user['id'] ?>">
                        <td><?= $user['id'] ?></td>

                        <td class="cat-name"><?= $user['login'] ?></td>
                        <td><?= $user['pass'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td class="actions">
                            <button class="btn-edit" onclick="editUser(<?= $user['id'] ?>)">Edit</button>
                            <button class="btn-save" onclick="saveuser(<?= $user['id'] ?>)">Save</button>
                            <button class="btn-delete" onclick="deleteUser(<?= $user['id'] ?>)">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
<!--<div class="modal-overlay">-->
<!--    <div class="modal">-->
<!---->
<!--        <h2>✏️ Редактирование категории</h2>-->
<!---->
<!--        <label>Новое название категории</label>-->
<!---->
<!--        <input type="text" id="categoryName" value="" placeholder="Введите новое название">-->
<!---->
<!--        <div class="buttons">-->
<!--            <button class="cancel" onclick="cancelBtn()">Отмена</button>-->
<!--            <button class="save" onclick="saveBtn()">Сохранить</button>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->