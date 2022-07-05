window.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelector('.menu__nav'),
        menuItem = document.querySelectorAll('.menu__item'),
        hamburger = document.querySelector('.hamburger');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('hamburger_active');
        menu.classList.toggle('menu_active');
    });

    menuItem.forEach(item => {
        item.addEventListener('click', () => {
            hamburger.classList.toggle('hamburger_active');
            menu.classList.toggle('menu_active');
        });
    });
});

history.replaceState(null, null, ' ');
$(function () {
    function setFormHTML(data) {
        return `
        <form id="editDbItem">
            <h3>Обновление услуги "${data.NAME}" </h3>
            <p>Новое название
                <input type='text' class="newName" value='${data.NAME}' />
                <input type='hidden' class="previousName" value='${data.NAME}' />

            </p>
            <p>Новая стоимость
                <input type='text' class="newCost" value='${data.COST}' />
                <input type='hidden' class="previousCost" value='${data.COST}' />
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
            url: '../php/getService.php',
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
        let previousCost = $("#editDbItem").find('.previousCost').val();
        let previousName = $("#editDbItem").find('.previousName').val();

        let data = new FormData();
        data.append('newName', newName);
        data.append('newCost', newCost);
        data.append('previousName', previousName);
        data.append('previousCost', previousCost);

        $.ajax({
            data: data,
            type: 'POST',
            url: '../php/updateProduct.php',
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
                    $('#error').html('<div class="alert mt-2 alert-danger">Ошибка, введите название услуги!!!</div>');
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
            url: '../php/deleteService.php',
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

        let data = new FormData();
        data.append('addName', addName);
        data.append('addCost', addCost);

        $.ajax({
            data: data,
            type: 'POST',
            url: '../php/addService.php',
            contentType: false,
            processData: false,
            success: function (getData) {
                location.reload();
            },
        });
    });


    const createItems = item => `        
        <div id="flush-collapseOne" class="accordion-collapse collapsed" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="row">
                <div class="tab col-3 border border-1 itemName"> ${item.name}</div>
                <div class="tab col-3 border border-1"> ${item.price} руб</div>

                <div class="col-3 p-0 px-2">
                    <a data-src="#updateForm" data-fancybox="updateForm ${item.name}" class="w-100 btn btn-outline-primary btnUpdate">
                        Редактировать
                    </a>
                </div>

                <div class=" col-3 p-0 px-2">
                    <form action='deleteService.php' method='post'>
                        <input type='hidden' name='name_delete' value='${item.name}' />
                        <input class="w-100  btn btn-outline-danger btnDelete" type='submit' value='Удалить'></tr>
                    </form>
                </div>
            </div>
        </div>`;

    $(".sortByName").click(function (e) {

        let radioName = $(this).find('.sortByName');
        let data = new FormData();
        data.append('ITEMS', radioName);

        $.ajax({
            data: data,
            type: 'POST',
            url: '../php/sortByNameService.php',
            contentType: false,
            processData: false,
            success: function (getData) {
                let parsedData = jQuery.parseJSON(getData);
                let html = parsedData.ITEMS.map(item => createItems(item)).join('');
                $('#itemWrapper').html(html);
            },
        });
    });

    $(".sortByCost").click(function (e) {

        let radioName = $(this).find('.sortByCost');
        let data = new FormData();
        data.append('ITEMS', radioName);

        $.ajax({
            data: data,
            type: 'POST',
            url: '../sort/sortByCostProduct.php',
            contentType: false,
            processData: false,
            success: function (getData) {
                let parsedData = jQuery.parseJSON(getData);
                let html = parsedData.ITEMS.map(item => createItems(item)).join('');
                $('#itemWrapper').html(html);
            },
        });
    });

});