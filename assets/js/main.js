$(function () {

    // Загрузка форм
    $('#type_figure').change(function (e) {
        $("#params").load("views/form.php", { data : $(this).val()}, function (response) {});
    });

    // Только цифры
    $('body').on('keydown', '.num', function (e) {
        if (e.key.length == 1 && e.key.match(/[^0-9'".]/)) {
            return false;
        };
    })

    // Форма
    $('#send').on('click', function () {
        let flag = false;
        $('#figure_data .num').each(function () {
            if ($(this).val().length >= 1) {
                flag = true;
            } else {
                flag = false;
                return;
            }
        });
        if (flag) {
            let data = {
                "type": $('#type_figure').val()
            };
            let points = [];
            $('.points').each(function () {
                let tmp = {
                    "x": $(this).find('.x').val(),
                    "y": $(this).find('.y').val()
                };
                points.push(tmp);
            });
            data.points = points;
            if ($('#radius').length) {
                data.radius = $('#radius').val();
            }
            $.ajax({
                url: "./actions/add.php",
                type: "POST",
                data: data,
                success: function (response) {
                    window.location.href = './views/db.php';
                }
            });
        } else {
            $('#lab').css('color', 'red');
        }
    });

});