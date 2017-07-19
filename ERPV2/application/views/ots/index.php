<style type="text/css" class="init">
	
td.details-control {
	background: url('/assets/AdminLTE-2.3.11/plugins/datatables/images/details_open.png') no-repeat center center;
	cursor: pointer;
}
tr.shown td.details-control {
	background: url('/assets/AdminLTE-2.3.11/plugins/datatables/images/details_close.png') no-repeat center center;
}

</style>

<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-border">
            <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
                <li class="active"><a href="/ots/">Listar O.T.S.</a></li>
                <li><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li><a href="/ots/ver/">Ver O.T.</a></li>
                <li><a href="/ots/borradas/">O.T.S. Borradas</a></li>
                <li><a href="/ots/pendientes/">O.T.S. Pendientes</a></li>
                <li><a href="/ots/vencidas/">O.T.S. Vencidas</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>O.T.</th>
                                    <th>Cantidad</th>
                                    <th>Artículo</th>
                                    <th>Plano</th>
                                    <th>Fecha de Necesidad</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row

        v = '<table border="2" class="display table-condensed table-striped" cellspacing="0" width="50%" style="background-color: #F9F9F9">'+
            '<tr>'+
                '<td><strong>Orden de Trabajo</strong></td>'+
                '<td>'+d.fabrica+' '+d.numero_ot+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td><strong>Producto</strong></td>'+
                '<td>'+d.producto+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td><strong>Artículo</strong></td>'+
                '<td>'+d.articulo+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td><strong>Posición</strong></td>'+
                '<td>'+d.posicion+'</td>'+
            '</tr>';
        if(d.plano != null) {
            v += '<tr>'+
                '<td><strong>Plano</strong></td>'+
                '<td>'+d.plano+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td><strong>Revisión</strong></td>'+
                '<td>'+d.revision+'</td>'+
            '</tr>';
        }
        if(d.fecha_terminado != null) {
            v += '<tr>'+
                    '<td><strong>Fecha de Terminado</strong></td>'+
                    '<td>'+d.fecha_terminado+'</td>'+
                '</tr>';
        }
        if(d.numeros_serie.length > 0) {
            var ns = '';
            for(i=0; i < d.numeros_serie.length; i++) {
                ns += d.numeros_serie[i].numero_serie+' - ';
            }
            v += '<tr>'+
                    '<td><strong>Números de Serie</strong></td>'+
                    '<td>'+ns.substr(0, ns.length-2)+'</td>'+
                '</tr>';
        }
        v += '<tr>'+
                '<td><strong>Acciones</strong></td>'+
                '<td>'+
                    '<a href="/ots/ver/'+d.idot+'/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">'+
                        '<button class="btn btn-success btn-xs">'+
                            '<i class="fa fa-eye"></i>'+
                        '</button>'+
                    '</a>'+
                    '<a href="/ots/pdf/'+d.idot+'/" data-pacement="top" data-toggle="tooltip" data-original-title="Generar Carátula" class="tooltips" target="_blank">'+
                        '<button class="btn btn-xs">'+
                            '<i class="fa fa-file"></i>'+
                        '</button>'+
                    '</a>'+
                    '<a href="/ots/modificar/'+d.idot+'/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">'+
                        '<button class="btn btn-warning btn-xs">'+
                            '<i class="fa fa-edit"></i>'+
                        '</button>'+
                    '</a>'+
                    '<a onclick="borrar('+d.idot+', '+d.numero_ot+');" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="tooltips">'+
                        '<button class="btn btn-danger btn-xs">'+
                            '<i class="fa fa-trash-o"></i>'+
                        '</button>'+
                    '</a>'+
                    '<a href="/log/ver/ots/'+d.idot+'/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="tooltips">'+
                        '<button class="btn btn-info btn-xs">'+
                            '<i class="fa fa-clock-o"></i>'+
                        '</button>'+
                    '</a>'+
                    '<a href="/ots/trazabilidad/'+d.idot+'/" data-pacement="top" data-toggle="tooltip" data-original-title="Trazabilidad" class="tooltips">'+
                        '<button class="btn btn-success btn-xs">'+
                            '<i class="fa fa-exchange"></i>'+
                        '</button>'+
                    '</a>'+
                '</td>'+
            '</tr>'+
        '</table>';

        return v;
    }
     
    function inicio() {
        var table = $('#example').DataTable( {
            "ajax": "/ots/index_ajax/",
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "numero_ot" },
                { "data": "cantidad"},
                {
                  "data": function(row, type, val, meta) {
                      return row.producto+' '+row.articulo;
                  }
                },
                {
                  "data": function(row, type, val, meta) {
                        if(row.plano != null) {
                            return "<a href='/planos/ver/"+row.idplano+"/'>"+row.plano+"</a>";
                        } else {
                            return "";
                        }
                  }
                },
                {
                  "data": "fecha_necesidad"
                },
                { "data": function(row, type, val, meta) {
                        if(row.fecha_terminado != null) {
                            return "<div class='badge bg-green'>CUMPLIDA</div>";
                        } else {
                            return "<div class='badge bg-red'>PENDIENTE</div>";
                        }
                    }
                }
                //{ "data": "name" },
                //{ "data": "position" },
                //{ "data": "office" },
                //{ "data": "salary" }
            ],
            "order": [[1, 'desc']],
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
         
        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
     
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    }
    
    function borrar(idot, numero_ot) {
            alertify.defaults.transition = "slide";
            alertify.defaults.theme.ok = "btn btn-success";
            alertify.defaults.theme.cancel = "btn btn-danger";
            alertify.defaults.theme.input = "form-control";
            alertify.defaults.notifier = {
                delay: 3,
                position: 'bottom-right',
                closeButton: false
            };
            alertify.defaults.glossary = {
                ok: "Confirmar",
                cancel: "Cancelar"
            };
            
            alertify.confirm(
                "<strong>¿Está seguro?</strong>",
                "Se eliminará la Orden de Trabajo "+numero_ot,
                function() {
                    $.ajax({
                        type: 'GET',
                        url: '/ots/borrar/'+idot,
                        //data: datos,
                        beforeSend: function() {
                            
                        },
                        success: function(data) {
                            alertify.defaults.glossary = {
                                ok: "Aceptar",
                            };
                            resultado = $.parseJSON(data);
                            if(resultado['status'] == 'error') {
                                alertify.alert('<strong>ERROR</strong>', resultado['data']);
                            } else if(resultado['status'] == 'ok') {
                                alertify.success("Se eliminó correctamente");
                            }
                        }
                    });
                },
                function() {
                    alertify.error("Se canceló la operación");
                }
            );
        }
</script>