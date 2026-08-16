
/*Добавление товара в корзину на странице productsPage*/
document.addEventListener('DOMContentLoaded', () => {

    /* находи кномку отправли в корзину и количества товара products на странице listingPage */
    const prodItemOnListing = document.querySelectorAll('.card');
    prodItemOnListing.forEach(function (element) {
        const sendToCartBtn = element.querySelector('#add-to-cart-btn');
        if(sendToCartBtn){
            sendToCartBtn.addEventListener('click', function () {
                const idProd = sendToCartBtn.getAttribute('data-product-id');
                const countEl = element.querySelector('#product-count-id');
                const prodCount = countEl ? countEl.textContent : '1';

                // Вызываем нашу общую функцию
                loadProducts(idProd, prodCount);
            });
        }

    });
    const productCard = document.querySelector('.container.product-layout');
    if (!productCard) {
        return;
    }

    const idProd = productCard.id;
    const countProd = document.querySelector('#product-count-id');
    const sendToCart = document.querySelector('#send-to-cart-btn-id');
    const cartPopup = document.querySelector('.popup-overlay');
    const closePopupBtn = document.querySelector('#closePopupBtn');

    if (sendToCart) {
        sendToCart.addEventListener('click', function () {
            const idProd = productCard.id;
            const prodCount = countProd ? countProd.textContent : '1';

            // Передаем собранные данные в ту же функцию
            loadProducts(idProd, prodCount);

            if (cartPopup) cartPopup.style.display = 'block';
        });
    }

    if (closePopupBtn) {
        closePopupBtn.addEventListener('click', function () {
            if (cartPopup) cartPopup.style.display = 'none';
        });
    }


})
function loadProducts(idProd, prodCount) {
    const params = new URLSearchParams();
    params.append('prod_id', idProd);
    params.append('prod_count', prodCount || '1');
    params.append('action', 'add_to_cart')

    fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: params.toString(),
    })
        .then(response => response.text())
        .then(data => {
            console.log('Ответ сервера:', data);

        });
}
/* Удаление товара со страницы cartProd*/
document.addEventListener('click', function (event) {
    const removeButton = event.target.closest('.remove');

    if (!removeButton) {
        return;
    }
    const params = new URLSearchParams();
    params.append('prod_id', removeButton.id);

    fetch('/cart', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: params.toString(),
    })
        .then(response => response.text())
        .then(data => {
            document.querySelector('main')?.remove();
            document.querySelector('header').insertAdjacentHTML('afterend', data);
        });
});

/*Находим всю корзину*/
const prodItemOnCart = document.querySelector('.cart-grid');
if (prodItemOnCart){
    prodItemOnCart.addEventListener('click', function (event){
        const target = event.target;
        /*Проверяем, кликнули ли по плюсу или минусу*/
        if (target.hasAttribute('data-qty-plus') || target.hasAttribute('data-qty-minus')) {
            const itemContainer = target.closest('.cart-item');
            /*Берем id товара*/
            const productId = itemContainer.dataset.id;
            const editProdCount = itemContainer.querySelector('.data-qty-value');
            const nameProd = itemContainer.querySelector('.name-prod');
            const priceId = itemContainer.querySelector('.price-id');
            const cartSummaryPrice = document.querySelector('.cart-summary-price');
            const priceInTotal = itemContainer.querySelector('.total-price-id')
            const prodCount = itemContainer.querySelector('.cart-count-prod')
            if (target.hasAttribute('data-qty-plus')) {
                getEditItem();
            } else {
                getEditItem()
            }
            function getEditItem (){
                const params = new URLSearchParams();
                params.append('prod_id', productId);
                params.append('name_prod', nameProd.textContent);
                params.append('new_qty', editProdCount.textContent);
                params.append('action', 'update_qty');
                prodCount.textContent = editProdCount.textContent;
                fetch('/cart', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: params.toString(),
                })
                    .then(response => response.text())
                    .then(data => {
                        const newPrice = Number(priceId.textContent);
                        const newCount = Number(editProdCount.textContent);
                        const newSumPrice = Number(cartSummaryPrice.textContent);

                        priceInTotal.textContent = (newPrice * newCount).toFixed(2);
                        if (target.hasAttribute('data-qty-plus')) {
                            cartSummaryPrice.textContent = (newSumPrice + newPrice).toFixed(2);
                        } else {
                            cartSummaryPrice.textContent = (newSumPrice - newPrice).toFixed(2);
                        }
                        console.log('Ответ сервера:', 'Данные отправлены');
                    });
            }
        }
    })
}
// pop up Для страницы Check Out //
const confirmOrder = document.getElementById('confirmOrder');
const closeConfirmOrderBtn = document.querySelectorAll('.popup-close');
const confirmPopup = document.querySelector('.modal-overlay');
const confirmBtn = document.querySelector('.confirm-btn');

// переменные для Ajax запроса //
const firstName = document.getElementById('firstNameId');
const lastName = document.getElementById('lastNameId');
const phoneNumber = document.getElementById('phoneNumberId');
const emailId = document.getElementById('emailId');
const cityId = document.getElementById('cityId');
const streetId = document.getElementById('streetId');
const descriptionForOrder = document.getElementById('descriptionForOrderId');
const promoId = document.getElementById('promoId');
const deliveryMethod = document.querySelectorAll('[name="delivery"]');
let deliveryId = '';
const paymentMethod = document.querySelectorAll('[name="payment"]');
let paymentId = '';

deliveryMethod.forEach(function (delivery){
    delivery.addEventListener('change', function (){
        if(delivery.checked){
            // получение айди выбранного метода Доставки
            deliveryId = delivery.id;
        }
    })
})
paymentMethod.forEach(function (payment){
    payment.addEventListener('change', function (){
        if(payment.checked){
            // получение айди выбранного метода Оплаты
            paymentId = payment.id;
        }
    })
})




if (confirmOrder) {
    confirmOrder.addEventListener('click', function () {
        if (confirmPopup) confirmPopup.style.display = 'flex';
        confirmBtn.addEventListener('click', function (){
            loadDataFromOrder();
        })
    });
}

if (closeConfirmOrderBtn) {
    closeConfirmOrderBtn.forEach(btn => btn.addEventListener('click', function (){
        if (confirmPopup) confirmPopup.style.display = 'none';
    }))
}
// отправление Аяксом готовый заказ в таблицу //
function loadDataFromOrder (){
    const params = new URLSearchParams();
    params.append('first_name', firstName.value );
    params.append('last_name', lastName.value);
    params.append('phone_number', phoneNumber.value);
    params.append('email', emailId.value);
    params.append('delivery', deliveryId.replace(/\D/g, ""));
    params.append('city', cityId.value);
    params.append('street', streetId.value);
    params.append('payment', paymentId.replace(/\D/g, ""));
    params.append('description_for_order', descriptionForOrder.value);
    params.append('promo', promoId.textContent);
    params.append('action', 'add_to_order');
    fetch('/success', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: params.toString(),
    })
        .then(response => response.json()) // Читаем JSON от PHP
        .then(data => {
            if (data.order_id) {
                // Делаем  редирект для динамического заказа добавленного последним
                window.location.href = '/success?order_id=' + data.order_id;
            }
        })
        .catch(error => console.error('Ошибка:', error));
}








