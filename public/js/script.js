document.addEventListener('DOMContentLoaded', () => {
  const menuBtn = document.querySelector('[data-menu-btn]');
  const nav = document.querySelector('[data-nav]');
  if (menuBtn && nav) {
    menuBtn.addEventListener('click', () => nav.classList.toggle('open'));
  }

  document.querySelectorAll('[data-qty]').forEach((qtyBox) => {
    const valueEl = qtyBox.querySelector('[data-qty-value]');
    const minus = qtyBox.querySelector('[data-qty-minus]');
    const plus = qtyBox.querySelector('[data-qty-plus]');
    let value = Number(valueEl?.textContent || 1);

    const render = () => valueEl.textContent = String(value);

    minus?.addEventListener('click', () => {
      value = Math.max(1, value - 1);
      render();
    });

    plus?.addEventListener('click', () => {
      value += 1;
      render();
    });
  });
});
// let filtAll = document.querySelectorAll(".checkbox");
// let prodAll = document.querySelectorAll(".card");
//
// filtAll.forEach(function (box) {
//   box.addEventListener("change", function () {
//     let checkboxList = [];
//     filtAll.forEach(function (activeBox) {
//       if (activeBox.checked) {
//         checkboxList.push(activeBox.id);
//       }
//     });
//     prodAll.forEach(function (prod) {
//       let prodCatId = prod.getAttribute("cat-id");
//       if (checkboxList.length === 0) {
//         prod.style.display = "block";
//       }
//       else if (checkboxList.includes(prodCatId)) {
//         prod.style.display = "block";
//       }
//       else {
//         prod.style.display = "none";
//       }
//     });
//   });
// });
document.addEventListener('DOMContentLoaded', function() {
  const mainPhoto = document.getElementById('main-photo');
  const thumbsContainer = document.querySelector('.thumbs');

  if (thumbsContainer && mainPhoto) {
    thumbsContainer.addEventListener('click', function(event) {
      // Проверяем, что кликнули именно по картинке-миниатюре
      const clickedImg = event.target.closest('.thumb-img');

      if (clickedImg) {
        // 1. Берем путь из data-full нажатой картинки
        const newSrc = clickedImg.getAttribute('data-full');

        // 2. Меняем src у основной фотографии
        mainPhoto.src = newSrc;

        // 3. (Опционально) Добавим эффект плавности через стили
        mainPhoto.style.opacity = 0;
        setTimeout(() => {
          mainPhoto.style.opacity = 1;
        }, 50);
      }
    });
  }
});



