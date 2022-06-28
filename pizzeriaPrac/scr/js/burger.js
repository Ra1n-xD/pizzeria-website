 // window.addEventListener('DOMContentLoaded', () => {
 //     const menu = document.querySelector('.navigation__nav'),
 //         menuBuy = document.querySelector('.navigation__buy'),
 //         menuItem = document.querySelectorAll('.navigation__item'),
 //         hamburger = document.querySelector('.hamburger');

 //     hamburger.addEventListener('click', () => {
 //         hamburger.classList.toggle('hamburger_active');
 //         menu.classList.toggle('navigation_active');
 //         menuBuy.classList.toggle('navigation_active');
 //     });

 //     menuItem.forEach(item => {
 //         item.addEventListener('click', () => {
 //             hamburger.classList.toggle('hamburger_active');
 //             menu.classList.toggle('navigation_active');
 //             menuBuy.classList.toggle('navigation_active');
 //         });
 //     });
 // });


 function setFormHTML(data) {
     return `
    <form id="editDbItem">
    <h3>Обновление пиццы "${data.NAME}" </h3>
    <p>Новое название
    <input type='text' class="newName" value='${data.NAME}' />
    <input type='hidden' class="previousName" value='${data.NAME}' />
    
    </p>
    <p>Новая стоимость
    <input type='text' class="newCost" value='${data.PRICE}' />
    <input type='hidden' class="previousCost" value='${data.PRICE}' />
    </p>
        <p>Новый вес
            <input type='text' class="newWeight" value='${data.WEIGHT}' />
            </p>
            <p>Наличие
            <input type='text' class="newAvbl" value='${data.AVBL}' />
            </p>
            <input class="btn btn-success btnSave" type='submit' value='Сохранить' />
            </form>
            <div id="error"></div>
            `;
 }
 $('body').on('click', '.btnUpdate', function (e) {
     let itemName = $(this).parent().parent().find('.itemName').text().trim();
     let data = new FormData();
     data.append('itemName', itemName);
     $.ajax({
         data: data,
         type: 'POST',
         url: '../php/getPizza.php',
         contentType: false,
         processData: false,
         success: function (getData) {
             let parsedData = jQuery.parseJSON(getData);
             let formHTML = setFormHTML(parsedData);
             $('#updateForm').html(formHTML);
         },
     });
 });

 $('body').on('submit', '#editDbItem', function (e) {
     e.preventDefault();

     let newName = $(this).find('.newName').val();
     let newCost = $(this).find('.newCost').val();
     let newWeight = $(this).find('.newWeight').val();
     let newAvbl = $(this).find('.newAvbl').val();
     let previousCost = $("#editDbItem").find('.previousCost').val();
     let previousName = $("#editDbItem").find('.previousName').val();

     let data = new FormData();
     data.append('newName', newName);
     data.append('newCost', newCost);
     data.append('newWeight', newWeight);
     data.append('newAvbl', newAvbl);
     data.append('previousName', previousName);
     data.append('previousCost', previousCost);

     $.ajax({
         data: data,
         type: 'POST',
         url: '../php/updatePizza.php',
         contentType: false,
         processData: false,

         beforeSend: function () {
             $('#error').text("");
         },

         success: function (getData) {
             let parsedData = jQuery.parseJSON(getData);
             if (parsedData.status == 'success') {
                 location.reload();
             } else {
                 $('#error').html('<div class="alert mt-2 alert-danger">Ошибка!!!</div>');
             }
         },
     });
 });

 $('body').on('click', '.btnDelete', function (e) {
     e.preventDefault();

     let itemName = $(this).parent().parent().parent().find('.itemName').text().trim();
     let data = new FormData();
     data.append('itemName', itemName);
     $.ajax({
         data: data,
         type: 'POST',
         url: '../php/deleteProduct.php',
         contentType: false,
         processData: false,
         success: function (getData) {
             location.reload();
         },
     });
 });

 $(".btnAdd").click(function (e) {
     e.preventDefault();

     let addName = $(this).parent().find('.addName').val();
     let addCost = $(this).parent().find('.addCost').val();
     let addWeight = $(this).parent().find('.addWeight').val();
     let addAvbl = $(this).parent().find('.addAvbl').val();

     let data = new FormData();
     data.append('addName', addName);
     data.append('addCost', addCost);
     data.append('addWeight', addWeight);
     data.append('addAvbl', addAvbl);

     $.ajax({
         data: data,
         type: 'POST',
         url: '../php/addPizza.php',
         contentType: false,
         processData: false,
         success: function (getData) {
             location.reload();
         },
     });
 });

 $(".btnOrder").click(function (e) {
     e.preventDefault();

     let productBuy = $(this).parent().find('.productBuy').val();
     let additionBuy = $(this).parent().find('.additionBuy').val();

     let data = new FormData();
     data.append('productBuy', productBuy);
     data.append('additionBuy', additionBuy);

     $.ajax({
         data: data,
         type: 'POST',
         url: '../php/finalOrder.php',
         contentType: false,
         processData: false,
         success: function (getData) {
             location.reload();
         },
     });
 });