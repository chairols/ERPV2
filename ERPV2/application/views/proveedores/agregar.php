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
                <li><a href="/proveedores/">Listar Proveedores</a></li>
                <li class="active"><a href="/proveedores/agregar/">Agregar Proveedor</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Proveedor</h4>
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
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('proveedor')?>" name="proveedor" autofocus required>
                                    <span class="help-inline">
                                        <?=form_error('proveedor', '<div class="alert alert-danger">', '</div>')?>
                                        <?=$alerta?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Domicilio</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('domicilio')?>" name="domicilio">
                                    <span class="help-inline">
                                        <?=form_error('domicilio', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('telefono')?>" name="telefono">
                                    <span class="help-inline">
                                        <?=form_error('telefono', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Localidad</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('localidad')?>" name="localidad">
                                    <span class="help-inline">
                                        <?=form_error('localidad', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Provincia</label>
                                <div class="controls">
                                    <select name="provincia" class="select2 input-xlarge">
                                        <?php foreach($provincias as $provincia) { ?>
                                        <option value="<?=$provincia['idprovincia']?>"><?=$provincia['provincia']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contacto</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('contacto')?>" name="contacto">
                                    <span class="help-inline">
                                        <?=form_error('contacto', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Correo</label>
                                <div class="controls">
                                    <input type="email" maxlength="100" class="input-xlarge" value="<?=set_value('correo')?>" name="correo">
                                    <span class="help-inline">
                                        <?=form_error('correo', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea class="input-xlarge" name="observaciones"><?=set_value('observaciones')?></textarea>
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
