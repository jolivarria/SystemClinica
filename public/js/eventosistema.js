
$(document).ready(function () {
    console.log('Se cargo script...');
    $('#btnAbrirExp').on('click', function () {
        console.log('Entro al click');
        $.ajax({
            type: "GET",
            url: "expedientes/openexp",
            data: {
               
            },
            success: function (response) {

                $("#content-modal").replaceWith(response);
            },
            complete: function (data) {

            },
            error: function (response) {
                console.log('Error:' + response);
            }

        });
    });

});

//<?= $this->url('ingreso-eliminar', ['action' => 'eliminar', 'id' => $ingreso->getIdIngresos()]) ?>