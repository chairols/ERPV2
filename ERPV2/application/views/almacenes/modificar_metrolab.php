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
                <li><a href="/almacenes/">Listar Almacenes</a></li>
                <li><a href="/almacenes/agregar/">Agregar Almacén</a></li>
                <li class="active"><a href="/almacenes/modificar/">Modificar Almacén</a></li>
                <li><a href="/almacenes/ver/">Ver Almacén</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Modificar Almacén</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Almacén</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=$almacen['almacen']?>" name="almacen" autofocus required>
                                    <span class="help-inline">
                                        <?=form_error('almacen', '<div class="alert alert-danger">', '</div>')?>
                                        <?=$alerta?>
                                    </span>
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