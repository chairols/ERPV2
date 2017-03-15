<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Upload File</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="100" class="form-control" id="nombre" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Archivo</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" maxlength="50" class="form-control" id="archivo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button id="agregar" class="btn btn-success">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
    function inicio() {
        $("#agregar").click(function() {
            
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
                ok: "Agregar",
                cancel: "Cancelar"
            };
            
            var file_data = ("#archivo").prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    alert(form_data);
            
            alertify.confirm(
                "<strong>¿Desea confirmar?</strong>",
                "Se agregará el archivo",
                function() {
                    var file_data = ("#archivo").prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    alert(form_data);
                    
                    
                    datos = {
                        'fecha' : $("#fecha").val(),
                        'tipo_mantenimiento' : $("#tipo_mantenimiento").val(),
                        'maquina' : $("#maquina").val(),
                        'diagnostico' : $("#diagnostico").val(),
                        'correccion' : $("#correccion").val(),
                        'usuario' : $("#usuario").val(),
                        'tiempo_reparacion' : $("#tiempo_reparacion").val()
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/prueba/upload_file_post/',
                        data: datos,
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
                                alertify.success("Se agregó correctamente");
                                document.getElementById("fecha").value = "";
                                document.getElementById("diagnostico").value = "";
                                document.getElementById("correccion").value = "";
                                document.getElementById("tiempo_reparacion").value = "";
                            }
                        }
                    });
                },
                function() {
                    alertify.error("Se canceló la operación");
                }
            );
            
        });
    }
</script>