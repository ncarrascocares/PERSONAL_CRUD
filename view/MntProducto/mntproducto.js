var tabla;

function init() {
    $("#producto_form").on("submit", function(e) {
        guardaryeditar(e);
    });
}

$(document).ready(function() {

    tabla = $('#producto_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax": {
            url: '../../controller/producto.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "ordering": false,
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }

    }).DataTable();
});

function guardaryeditar(e) {
    e.preventDefault();
    var formData = new FormData($("#producto_form")[0]);

    $.ajax({
        url: "../../controller/producto.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos) {
            console.log(datos);
            $('#producto_form')[0].reset();
            $('#modalmantenimiento').modal('hide');
            $('#producto_data').DataTable().ajax.reload();

            swal.fire(
                'Registro!',
                'Se registro de manera correcta!',
                'success'
            )
        }
    });
}


function editar(prod_id) {
    console.log(prod_id);
}

function eliminar(prod_id) {
    swal.fire({
        title: 'CRUD',
        text: "Desea eliminar el registro?",
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            //Se pasa el {prod_id} al controlador/producto.php en el case eliminar
            $.post("../../controller/producto.php?op=eliminar", { prod_id: prod_id }, function(data) {});
            //una vez ejecutado la opcón eliminar se realiza una actualización en la tabla "id=producto_data" del index
            $('#producto_data').DataTable().ajax.reload();

            swal.fire(
                'Eliminado!',
                'Se elimino de manera correcta!',
                'success'

            )
        } else if (


            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {

            swal.fire(
                'Cancelado',
                'Se ha cancelado la opción eliminar :)',
                'error'
            )
        }
    });
}

//Llamando al modalmantenimiento a traves del boton nuevo registro que está en el index
$(document).on("click", "#btnnuevo", function() {
    $('#mdltitulo').html('Nuevo Registro');
    $('#modalmantenimiento').modal('show');
});

init();