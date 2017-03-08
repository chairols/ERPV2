<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/tiposmaquinas/">Listar Tipos de Máquinas</a></li>
                <li class="active"><a href="/tiposmaquinas/agregar/">Agregar Tipo de Máquina</a></li>
                <li><a href="/tiposmaquinas/modificar/">Modificar Tipo de Máquina</a></li>
                <li><a href="/tiposmaquinas/ver/">Ver Tipo de Máquina</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Máquina</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="100" class="form-control" id="tipomaquina" name="tipomaquina" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="contenido"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="contenido"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button id="ok" class="btn btn-success">Agregar</button>
                                    <button type="reset" class="btn btn-primary">Limpiar</button>
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
        $("#ok").click(function() {
            alertify.defaults.transition = "slide";
            alertify.defaults.theme.ok = "btn btn-success";
            alertify.defaults.theme.cancel = "btn btn-danger";
            alertify.defaults.theme.input = "form-control";
            alertify.defaults.notifier = {
                delay: 3,
                position: 'bottom-right',
                closeButton: false
            }
            alertify.defaults.glossary = {
                ok: "Agregar",
                cancel: "Cancelar"
            }
            
            if($("#tipomaquina").val() != '') {
                alertify.confirm(
                        "<strong>¿Desea confirmar?</strong>", "Se agregará el tipo de máquina "+$("#tipomaquina").val(),
                    function() {
                        datos = {
                            'tipomaquina' : $("#tipomaquina").val()
                        };
                        $.ajax({
                            type: 'POST',
                            url: '/tiposmaquinas/agregar_post/',
                            data: datos,
                            beforeSend: function() {
                                //$("#contenido").html('<img src="/assets/img/ajax-loader.gif">');
                            },
                            success: function(data) {
                                if(data == 0) {
                                    alertify.success("Se agregó");
                                    $("#tipomaquina").val('');
                                } else if(data == 1) {
                                    alertify.error("El Tipo de Máquina ya existe");
                                } else if(data == 2) {
                                    alertify.error("No se pudo agregar");
                                } else if(data == 3) {
                                    $("#contenido").html('<div class="alert alert-danger">El campo no puede estar vacío</div>');
                                }
                            }
                        });

                    },
                    function() {
                        alertify.error("Se canceló la operación");
                    }
                );
            } else {
                alertify.defaults.glossary = {
                    ok: "OK"
                }
                alertify.alert('Atención !', 'El campo no puede estar vacío');
            }
        });
    }
</script>