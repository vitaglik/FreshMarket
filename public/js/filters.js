document.addEventListener('DOMContentLoaded', () => {
    /**
     *
     * Блок страницы с товарами
     */
    const productList = document.querySelector('#products-grid');
    const priceMinInput = document.querySelector('#priceMinInput');
    const priceMaxInput = document.querySelector('#priceMaxInput');
    const nameInput = document.querySelector('#nameInput');
    /**
     * кнопка сброса
     */
    const resetBtn = document.querySelector('#reset-btn');

    if (!productList || !priceMinInput || !priceMaxInput || !nameInput || !resetBtn) {
        return;
    }

    /**
     * получаем чекбоксы фильтров
     */
    document
        .querySelectorAll('input[name="filters[]"]')
        .forEach(input => {

            input.addEventListener('change', loadProducts);

        });

    /**
     * получаем чекбоксы категорий
     */
    document
        .querySelectorAll('input[name="categories[]"]')
        .forEach(input => {

            input.addEventListener('change', loadProducts);

        });
    /**
     * получаем все кнопки фильтров
     */
    let filters = document.querySelectorAll('.filter-chip');
    let filterBtn = '';

            filters.forEach(function (btn) {
                 btn.addEventListener('click', function (){

                     if (btn.classList.contains('filter-chip-active')) {
                         btn.classList.remove('filter-chip-active')
                         btn.classList.add('filter-chip');
                         filterBtn = false;
                         loadProducts();
                     } else {
                         btn.classList.remove('filter-chip')
                         btn.classList.add('filter-chip-active');
                         filterBtn = true;
                         loadProducts();
                     }
            })
                })


    /**
     * получаем инпуты прайсов
     */
    priceMinInput.addEventListener('input', loadProducts);
    priceMaxInput.addEventListener('input', loadProducts);
    nameInput.addEventListener('input', loadProducts);

    /**
     * сброс фильтров
     */
    resetBtn.addEventListener('click', () => {
        document.querySelectorAll('input[type="checkbox"]').forEach(input => {
            input.checked = false;
        })

        priceMinInput.value = '';
        priceMaxInput.value = '';
        nameInput.value = '';

        loadProducts();
    });

    function loadProducts() {
        /**
         * create URL
         */
        const params = new URLSearchParams();

        /**
         * get Filters
         */
        document
            .querySelectorAll('input[name="filters[]"]:checked')
            .forEach(input => {
                params.append('filters[]', input.value);
            });

        /**
         * get Categories
         */
        document
            .querySelectorAll('input[name="categories[]"]:checked')
            .forEach(input => {
                params.append('categories[]', input.value);
            });

        /**
         * get Price and byName
         */
        if (priceMinInput.value !== '') {
            params.append('price_min', priceMinInput.value);
        }
        if (priceMaxInput.value !== '') {
            params.append('price_max', priceMaxInput.value);
        }

        if (nameInput.value !== ''){
            params.append('find_name', nameInput.value)
        }
        /**
         * get Popular
         */

        document.querySelectorAll('.filter-chip-active')
            .forEach(function (btn){
                params.append('filter[]', btn.name)
            })

        /**
         * send request to server AJAX method GET
         */
        // fetch('/listing/filter?' + params.toString())
        //     .then(response => response.text())
        //     .then(html => {
        //         productList.innerHTML = html;
        //     })
        //     .catch(error => console.error('Error:', error));

        /**
         * send request to server AJAX method POST
         */
        fetch('/listing', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: params.toString(),
        })
            .then(async response => {
                if (!response.ok) {
                    // получаем текст ошибки от сервера
                    const errorText = await response.text();

                    throw new Error('Ошибка ответа от сервера: ' + errorText + ': ' + response.status);
                }
                return response.text();
            })
            .then(html => {
                productList.innerHTML = html;
            })
            .catch(error => {
                console.error('Error:', error.message);
            });
    }
})
