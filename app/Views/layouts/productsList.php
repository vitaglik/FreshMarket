<?php foreach ($productInfo as $key => $value) : ?>
    <article class="card" cat-id="<?= $value['id'] ?>">
        <div>
            <a class="card-image" href="/product/<?= $value['id'] ?>"
               style="display: block; width: 100%; height: 200px; background: linear-gradient(135deg, #eef5e7, #ddeec8); overflow: hidden;">
                <img src="../../public/img/<?= $value['main_img'] ?>"
                     alt=""
                     style="width: 100%; height: 100%; object-fit: contain; padding: 10px; box-sizing: border-box;"/>
            </a>
        </div>
        <div class="card-body">
            <h3><?= $value['name_prod'] ?></h3>

            <div class="price-row">
                <div class="price"><?= $value['price'] ?>₴</div>
            </div>
            <div class="qty" data-qty style="width:fit-content; gap:6px; padding:4px 6px; flex-shrink:0;">
                <button class="qty-btn" data-qty-minus style="width:24px; height:24px;">-</button>
                <strong data-qty-value id="product-count-id">1</strong>
                <button class="qty-btn" data-qty-plus style="width:24px; height:24px;">+</button>
            </div>
            <button class="add-to-cart-btn" id="add-to-cart-btn" data-product-id="<?= $value['id'] ?>">
                🛒
            </button>
        </div>
    </article>
<?php endforeach; ?>