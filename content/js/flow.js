$(document).ready(function(){
    consultarFlujo();
});

function consultarFlujo(){
    var cadena = "aux=consultarFlujo";
    $.ajax({
        type: "POST",
        url: "controller/fundsController.php",
        data: cadena,
        success: function (data) {
            $("#divTableFlujo").html(data);
            dataTable("tableFlujo");
            console.log(data);
        },
        error: function (e) {
            console.log(e);
            error_noti("Sistema no disponible");
        }
    });
}

function deletelead(id){
    const id2=id;
    window.value=id2;  
    $('#eliminateLead').modal({backdrop: 'static', keyboard: false});
    $("#eliminateLead").modal("show");
    
}

function eliminate(){
    var cadena = "aux=deleteRow&id="+window.value;
    $.ajax({
        type: "POST",
        url: "controller/fundsController.php",
        data: cadena,
        success: function (data) {
            if (data == true) {
                success_noti("Registro Eliminado");
                $("#eliminateLead").modal("hide");
                window.location.href="flujo.php";
                
            }else {
                error_noti("Error al eliminar");
            }
      
        },
        error: function (e) {
            console.log(e);
            error_noti("Sistema no disponible");
        }
    });
}


function dataTable(nombreTabla) {
    $("#" + nombreTabla + " thead tr").clone(true).appendTo('#' + nombreTabla + ' thead');
    $('#' + nombreTabla + ' thead tr:eq(1) th').each(function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="" /> ');
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                        .column(i)
                        .search(this.value)
                        .draw();
            }
        });
    });
    var table = $('#' + nombreTabla + '').DataTable({
        //orderCellsTop: true,
        //fixedHeader: true,
        "pageLength": 8,
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [],
        language: {
            "decimal": ",",
            "thousands": ".",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoPostFix": "",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "loadingRecords": "Cargando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchPlaceholder": "Termino de busqueda",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningun dato disponible en esta tabla",
            "buttons": {
                "create": "Nuevo",
                "edit": "Cambiar",
                "remove": "Borrar",
                "copy": "Copiar",
                "csv": "fichero CSV",
                "excel": "Excel",
                "pdf": " PDF",
                "print": "Imprimir",
                "colvis": "Visibilidad columnas",
                "collection": "ColecciÃ³n",
                "upload": "Seleccione fichero...."
            },
            "select": {
                "rows": {
                    _: '%d filas seleccionadas',
                    0: 'clic fila para seleccionar',
                    1: 'una fila seleccionada'
                }
            }
        },
        aoColumnDefs: [{
                'bSortable': false,
                'aTargets': [0]
            }]

    });
}
