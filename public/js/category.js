function newObject() {
const createBtn = document.querySelector('.btn-new');
const addNewCat = document.querySelector('.modal-overlay');
addNewCat.style.display = 'flex';
}
function saveBtn(){
    const input = document.getElementById("categoryName").value;
    const params = new URLSearchParams();
    params.append('cat_name', input);

    fetch('/admin/categories', {
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
            location.reload();
        });

}
function cancelBtn(){
    const addNewCat = document.querySelector('.modal-overlay');
    addNewCat.style.display = 'none';
}

function editCategory(id) {
    let catRow = document.getElementById(id);
    let editBtn = catRow.querySelector('.btn-edit');
    let saveBtn = catRow.querySelector('.btn-save');
    let currentName = catRow.querySelector('.cat-name');
    const input = document.createElement('input');
    editBtn.style.display = 'none';
    input.type = 'text';
    input.value = currentName.textContent.trim();
    currentName.innerHTML = '';
    input.className = 'edit-input';
    currentName.appendChild(input);
    saveBtn.style.display = 'inline-block';
}
function saveCategory(id) {
    let catRow = document.getElementById(id);
    let editBtn = catRow.querySelector('.btn-edit');
    let saveBtn = catRow.querySelector('.btn-save');
    let editName = catRow.querySelector('.edit-input');
    let newName = editName.value;
    let nameSpace = catRow.querySelector('.cat-name');
    nameSpace.textContent = newName;
    editBtn.style.display = 'inline-block';
    saveBtn.style.display = 'none';

    /* Аякс запрос на сохранение измененной категории */
    const params = new URLSearchParams();
    params.append('cat_id', id);
    params.append('cat_name', newName);

    fetch('/admin/categories', {
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

function deleteCategory(id) {
    const params = new URLSearchParams();
    params.append('cat_id', id);

    fetch('/admin/categories', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: params.toString(),
    })
        .then(response => response.text())
        .then(data => {
            console.log('Ответ сервера:', data);
            location.reload();
        });
}