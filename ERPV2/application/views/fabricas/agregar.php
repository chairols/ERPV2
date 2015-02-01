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
                <li><a href="/fabricas/">Listar Fábricas</a></li>
                <li class="active"><a href="/fabricas/agregar/">Agregar Fábrica</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Fábrica</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('fabrica')?>" name="fabrica" autofocus required>
                                    <span class="help-inline">
                                        <?=form_error('fabrica', '<div class="alert alert-danger">', '</div>')?>
                                        <?=$alerta?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('direccion')?>" name="direccion" required>
                                    <span class="help-inline">
                                        <?=form_error('direccion', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Localidad</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('localidad')?>" name="localidad" required>
                                    <span class="help-inline">
                                        <?=form_error('localidad', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('telefono')?>" name="telefono" required>
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