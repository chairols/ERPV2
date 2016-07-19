<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/retenciones/">Listar Retenciones</a></li>
                <li class="active"><a href="/retenciones/agregar/">Agregar Retención</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Retención</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Proveedor</label>
                                <div class="controls">
                                    <select name="proveedor" class="span12 select2" onchange="cambiar();" id="proveedor">
                                        <?php foreach($proveedores as $proveedor) { ?>
                                        <option value="<?=$proveedor['idproveedor']?>"><?=$proveedor['proveedor']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Moneda</label>
                                <div class="controls">
                                    <select name="moneda" class="span12 select2">
                                        <?php foreach($monedas as $moneda) { ?>
                                        <option value="<?=$moneda['idmoneda']?>"><?=$moneda['moneda']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Porcentaje</label>
                                <div class="controls">
                                    <div id="resultado"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha</label>
                                <div class="controls controls-row">
                                    <input class="span12" type="text" class="form-control" id="dp1" name="fecha" readonly required>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-save"></i> Guardar
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="icon-remove"></i> Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function inicio() {
        cambiar();
    }
    
    function cambiar() {
        $.ajax({
            type: 'GET',
            url: '/padron/proveedor/'+$("#proveedor").val(),
            beforeSend: function() {
                $("#resultado").html('<img src="/assets/img/ajax-loader.gif">');
            },
            success: function(data) {
                $("#resultado").html(data);
            }
        });
    }
</script>