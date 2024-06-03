
$(document).ready(function () {
    console.log('Se cargo script...');
    $('#btnAbrirExp').on('click', function () {
        console.log('Entro al click');
        /*$.ajax({
            type: "GET",
            url: "recate/new",
            data: {
                accion: "registro ajax"
            },
            success: function (response) {

                $("#content-modal").replaceWith(response);
            },
            complete: function (data) {

            },
            error: function (response) {
                console.log('Error:' + response);
            }

        });*/
    });

});
