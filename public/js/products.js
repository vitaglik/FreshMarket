function newProduct() {

}
function editProduct(id) {

    const editProdPopUp = document.querySelector('.product-edit-modal-overlay')
    editProdPopUp.style.display = 'flex';

    const btnModalClose = document.querySelector('.product-edit-modal-close');
    const btnModalCancel = document.querySelector('.product-edit-cancel-btn');
    function closePopUp (){
        editProdPopUp.style.display = 'none';
    }
    btnModalClose.addEventListener('click', function (){
        closePopUp();
    })
    btnModalCancel.addEventListener('click', function (){
        closePopUp();
    })


    let prodRow = document.querySelector(`.prodId-${id}`);
    let nameProd = prodRow.querySelector('.name-prod');
    let priceProd = prodRow.querySelector('.price-prod');
    let imgProd = prodRow.querySelector('.img-prod');
    let countInStoreProd = prodRow.querySelector('.count-in-store-prod');
    let articleProd = prodRow.querySelector('.article-prod');
    let categoryProd = prodRow.querySelector('.category-prod')

    let editNameProd = document.querySelector('.edit-name');
    let editPriceProd = document.querySelector('.edit-price');
    let editImgProd = document.querySelector('.edit-img');
    let editCountProd = document.querySelector('.edit-count');
    let editArticle = document.querySelector('.edit-article');
    let editCatProd = document.querySelectorAll('.edit-category')


    editNameProd.value = nameProd.textContent;
    editPriceProd.value = priceProd.textContent;
    editImgProd.src = imgProd.src;
    editCountProd.value = countInStoreProd.textContent;
    editArticle.value = articleProd.textContent;
    editCatProd.forEach(function (category){
        if (category.textContent === categoryProd.textContent) {
            category.selected = true
        }
    })
}
function saveProduct() {
    const btnSaveProd = document.querySelector('.product-edit-save-btn');
    btnSaveProd.addEventListener('click', function (){

    })
}
function deleteProduct() {

}
