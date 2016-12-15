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
                <li><a href="/controles/">Listar Controles</a></li>
                <li class="active"><a href="/controles/agregar/">Agregar Control</a></li>
                <li><a href="/controles/modificar/">Modificar Control</a></li>
                <li><a href="/controles/ver/">Ver Control</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Control</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Control</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" onkeyup="prueba();" class="span12" id="control" name="control" autofocus required>
                                    <div id="resultado">
                                        <span class="help-inline" style="display: none;">El control ya existe.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" disabled>
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
        
    }
    
    function prueba() {
        $.ajax({
            type: 'GET',
            url: '/controles/ajax_check_control/'+$("#control").val(),
            /*beforeSend: function() {
                $("#resultado").html('<img src="/assets/img/ajax-loader.gif">');
            },*/
            success: function(data) {
                $("#resultado").html(data);
            }
        });
        
    }
</script>