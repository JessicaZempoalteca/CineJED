//para usar los js en una datatable se debe poner la id de la tabla en la funcion que da diseño e interaccion a la tabla
$('#table-usuarios').dataTable({
    'processing': true, //buscar datos
    "responsive": true, 
    // "scrollX": true,
    "language": { //traduccion de la tabla
        "lengthMenu": "Mostrar _MENU_ datos",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "Datos no disponibles por el momento",
        "processing":     "Procesando ...",
        "search":         "Buscar:",
        "zeroRecords":    "Datos no disponibles por el momento",
        "paginate": {
        "first":      "Primera",
        "last":       "Última",
        "next":       "Siguiente",
        "previous":   "Anterior"
        },
    }//End language
});