 
var cargartabla;
var token= $('meta[name="csrf-token"]').attr('content');
var editor; 
$(document).ready(function () { 
    cargartabla=  $('#posts').DataTable({

      responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
        "lengthMenu": [[5,10,15,25, 50, 100,150,200], [5,10,15,25, 50, 100,150,200]],
          "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
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
                }
                },
"oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
 "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "/allobjeto",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: token}
                   },
            "columns": [
                { "data": "id" },
                { "data": "nombre" },
                { "data": "url" }
                ,
                { "data": "tipoobjeto" }
                ,
                { "data": "modulo" }
                ,
                { "data": "action" }
            ] 
        });
 
    });
 


 