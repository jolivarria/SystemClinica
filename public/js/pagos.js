
$(document).ready(function () {
    console.log('Se cargo script...');
    $('#addProduct').on('click', function () {

        $.ajax({
            url: 'expedientes/listexpediente',
            type: 'GET',
            success: function (response) {
                mostrarDatos(response);
                var inde = 0;
                var select = '<select name="productos[][id]">';
                $.each(response, function (index, item) {
                    console.log(item[0].nombreCompleto);
                    //item[index].idExpedientes
                    select += '<option value="' + item[inde].idExpedientes + '">' + item[inde].nombreCompleto + '</option>';
                });
                inde++;
                select += '</select>';
                $('#productos').append('<div><label for="producto_id">Producto:</label>' + select + '<label for="cantidad">Cantidad:</label><input type="number" name="productos[][cantidad]" /><label for="precio">Precio:</label><input type="number" name="productos[][precio]" /></div>');

                $('#productos').append('<label for="nombre">Precio:</label><div class="form-group"><input type="number" name="precio" required="" size="2" maxlength="2" pattern="^[0-9]+$" data-toggle="tooltip" class="form-control" title="Producto o Servicio" placeholder="Producto o Servicio" value=""></div><div class="text-danger"></div>' +
                    '<label for="nombre">Cantidad:</label><div class="form-group"><input type="number" name="cantidad" required="" size="2" maxlength="2" pattern="^[0-9]+$" data-toggle="tooltip" class="form-control" title="Producto o Servicio" placeholder="Producto o Servicio" value=""></div><div class="text-danger"></div>');
            }
        });
    });
    $("#divIngreso").click(function (e) {
        e.preventDefault();
        $("#addconte").prepend(
            '<div class="card-body" style="display: block;">' +
            '<div class="row">' +
            '<!-- Costo de tratamiento $500 -->' +


            '<div class="col-8 ">' +
            'ingreso de paciente:' +
            '<input type="text" name="edad" required="" pattern="^[0-9]+$" data-toggle="tooltip" class="form-control" title="" placeholder="" value="$3,500"><input type="number" name="edad" required="" size="2" maxlength="2" pattern="^[0-9]+$" data-toggle="tooltip" class="form-control" title="La Edad debe constar de solo números" placeholder="" value="1">' +
            '<div class="icon">' +
            '<i class="ion ion-bag"></i>' +
            '</div>' +
            '<a href="#" class="small-box-footer">Otra cantidad <i class="fas fa-arrow-circle-right"></i></a>' +

            '</div>' +
            '</div>' +
            '</div>');


    });
    function mostrarDatos(data) {
        var tableBody = $('#expedientesTable tbody');
        //tableBody.empty();
        var inde = 0;
        console.log(data);
        // Asegúrate de que data sea un array
        //if (Array.isArray(data)) {
            $.each(data, function (index, item) {
                var row = '<tr>' +
                    '<td>' + item.nombreCompleto + '</td>' +
                  
                    // Agrega más columnas según tus propiedades
                    '</tr>';
                tableBody.append(row);
            });
        //}
        var arr = ["blue", "yellow", "red"];
        console.log(arr);
        console.log(data);
        $.each(arr, function (index, value) {
            console.log(index + ": " + value);
        });
    }
});

