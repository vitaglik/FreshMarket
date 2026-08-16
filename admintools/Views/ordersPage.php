<div class="layout">

    <?php
    //    echo '<pre>';
    //    var_dump($orderInfo);
    require_once __DIR__ . '/../../admintools/Views/layouts/sidebar.php' ?>

    <main class="content">
        <section class="welcome">
            <div>
                <p>
                    Здесь вы можете управлять
                    заказами .
                </p>
            </div>
        </section>
        <div class="orders-page">
            <div class="orders-container">
                <div class="orders-header">
                    <button class="btn-new">
                        + New Order
                    </button>
                </div>
                <div class="orders-stats">
                    <div class="orders-stat-card">
                        <span>Total Orders</span>
                        <h2>----</h2>
                    </div>
                    <div class="orders-stat-card">
                        <span>New Orders</span>
                        <h2>----</h2>
                    </div>
                    <div class="orders-stat-card">
                        <span>Processing</span>
                        <h2>----</h2>
                    </div>
                    <div class="orders-stat-card">
                        <span>Completed</span>
                        <h2>----</h2>
                    </div>
                </div>
                <div class="orders-filters">
                    <input type="text" class="orders-search" placeholder="Search order...">
                    <select class="orders-select">
                        <option>All Statuses</option>
                        <option>New</option>
                        <option>Processing</option>
                        <option>Shipped</option>
                        <option>Completed</option>
                        <option>Cancelled</option>
                    </select>
                    <select class="orders-select">
                        <option>Today</option>
                        <option>This week</option>
                        <option>This month</option>
                    </select>
                </div>
                <div class="orders-table-wrapper">
                    <table class="orders-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orderInfo as $order) : ?>
                        <tr>
                            <td>#<?= $order['main_id'] ?></td>
                            <td>
                                <div class="orders-customer">
                                    <strong><?= $order['first_name'] ?></strong>
                                    <span><?= $order['email'] ?></span>
                                </div>
                            </td>
                            <td>+<?= $order['phone_number'] ?></td>
                            <td><?= $order['order_time'] ?></td>
                            <td>????</td>
                            <td>
                                <span class="orders-status orders-status-new">New</span>
                            </td>
                            <td>Card</td>
                            <td>
                                <div class="orders-actions">
                                    <button class="orders-view-btn">
                                        View
                                    </button>
                                    <button class="orders-edit-btn">
                                        Edit
                                    </button>
                                    <button class="orders-delete-btn">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>