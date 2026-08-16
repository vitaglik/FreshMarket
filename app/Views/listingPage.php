<main>
    <div class="container breadcrumbs">Главная / Каталог</div>
    <section class="page-head">
        <div class="container">
            <span class="badge"><?= $count_prods?> товаров</span>
            <h1>Каталог товаров</h1>
        </div>
    </section>
    <section class="section" style="padding-top:0">
        <div class="container sidebar-layout">
            <aside class="panel">
                <h3>Фильтры</h3>
                <div class="filter-list">
                    <?php
                    foreach ($filters as $key => $value) { ?>
                        <div>
                            <input type="checkbox" id="filter_<?= $value['id'] ?>" value="<?= $value['id'] ?>"
                                   name="filters[]">
                            <label for="filter_<?= $value['id'] ?>"
                                   class="filters"><?= $value['filter_name'] ?></label>
                        </div>
                    <?php } ?>
                </div>
                <h3 style="margin-top:22px">Категории</h3>
                <div class="filter-list">
                    <?php
                    foreach ($categories as $key => $value) { ?>
                        <div>
                            <input type="checkbox" id="category_<?= $value['id']?>" name="categories[]" value="<?= $value['id']?>">
                            <label for="category_<?= $value['id']?>" class="category">
                                <?= $value['cat_name'] ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
                <div class="filter-list">
                    <h3 style="margin-top:22px">Цена</h3>
                    <input class="input" id="priceMinInput" name="price_min" placeholder="От 1 ₴">
                    <input class="input" id="priceMaxInput" name="price_max" placeholder="До 300 ₴">
                    <button id="reset-btn" class="btn reset-btn">Сбросить фильтры</button>
                </div>
            </aside>
            <div>
                <div class="toolbar">
                    <div class="filters" id="filters">
                        <button class="filter-chip btn" name="popular" >Популярные</button>
                        <button class="filter-chip btn" name="promotions">Акции</button>
                        <button class="filter-chip btn" name="new">Новые</button>
                    </div>
                    <div style="min-width:220px">
                        <div class="sort-select">
                            <select class="select">
                                <option>Сортировка: по популярности</option>
                                <option>По цене ↑</option>
                                <option>По цене ↓</option>
                                <option>По новизне</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="products-grid" id="products-grid">
                    <?php require __DIR__ . '/../../app/Views/layouts/productsList.php' ?>
                </div>
                <div class="pagination">
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">→</button>
                </div>
            </div>
        </div>
    </section>
</main>