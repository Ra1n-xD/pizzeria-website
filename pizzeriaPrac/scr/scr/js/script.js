$(document).ready(function () {

    $('.owl-carousel').owlCarousel({
        loop: true,
        center: true,
        autoWidth: true,
        margin: 20,
        nav: false,
        items: 1,
    });

    $('.login-btn').click(function (e) {
        e.preventDefault();
        let emailAuth = $('input[name="emailAuth"]').val(),
            passwordAuth = $('input[name="passwordAuth"]').val();

        $.ajax({
            url: '../php/signin.php',
            type: 'POST',
            dataType: 'json',
            data: {
                emailAuth: emailAuth,
                passwordAuth: passwordAuth,
            },
            success(data) {
                if (data.status) {
                    document.location.href = 'index.php';
                } else {
                    $('.messege-auth').text(data.message);
                    $('input[name="passwordAuth"]').val("");
                }
            }
        });
    });

    $('.register-btn').click(function (e) {
        e.preventDefault();
        let email = $('input[name="email"]').val(),
            password = $('input[name="password"]').val(),
            passwordConfirm = $('input[name="passwordConfirm"]').val(),
            name = $('input[name="name"]').val();

        $.ajax({
            url: '../php/signup.php',
            type: 'POST',
            dataType: 'json',
            data: {
                email: email,
                password: password,
                passwordConfirm: passwordConfirm,
                name: name,
            },
            success(data) {
                if (data.status) {
                    document.location.href = 'login.php';
                    $(".messege-regi").addClass("text-primary");
                    $('.messege-regi').text(data.message);
                } else {
                    $(".messege-regi").addClass("text-danger");
                    $('.messege-regi').text(data.message);
                    $('input[name="password"]').val("");
                    $('input[name="passwordConfirm"]').val("");
                }
            }
        });
    });

    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url: '../php/cart.php',
            type: 'GET',
            dataType: 'json',
            data: {
                cart: 'add',
                id: id,
            },
            success(res) {
                console.log(res);
            }
        });
    });


});

// action="singin.php" method="POST"