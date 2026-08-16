
<section class="section" style="padding-top:0">
    <div class="container">
        <div class="section-head">
            <div>
                <h2>Популярные товары</h2>
                <p>Блок рекомендованных товаров.</p>
            </div>
        </div>
        <div class="products-grid">
            <?php
            foreach ($popularProductInfo as  $value) {?>

                <article class="card" cat-id="<?= $value['id'] ?>">
                    <div class="card-image "
                         style="background-image: url('../../public/img/<?= $value['main_img'] ?>'), linear-gradient(135deg, #eef5e7, #ddeec8)"></div>
                    <div class="card-body">
                        <h3><?= $value['name_prod'] ?></h3>
                        <div class="price-row">
                            <div class="price"><?= $value['price'] ?>₴</div>
                            <a class="btn" href="product/<?= $value['id'] ?>">Открыть</a></div>
                </article>
            <?php } ?>
        </div>
</section>


