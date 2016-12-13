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
                <li><a href="/usuarios/">Listar Usuarios</a></li>
                <li><a href="/usuarios/agregar/">Agregar Usuario</a></li>
                <li class="active"><a href="/usuarios/modificar/">Modificar Usuario</a></li>
            </ul>
        </div>
        
        En desarrollo
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Modificar Usuario</h4>
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
                                    <input type="text" maxlength="45" class="span12" value="<?=set_value('nombre')?>" name="nombre" autofocus required>
                                    <?php form_error('nombre', '<span class="help-inline"><div class="alert alert-danger">', '</div></span>'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellido</label>
                                <div class="controls">
                                    <input type="text" maxlength="45" class="span12" value="<?=set_value('apellido')?>" name="apellido" required>
                                    <?php form_error('apellido', '<span class="help-inline"><div class="alert alert-danger">', '</div></span>'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Correo</label>
                                <div class="controls">
                                    <input type="email" maxlength="100" class="span12" value="<?=set_value('correo')?>" name="correo">
                                    <?php form_error('correo', '<span class="help-inline"><div class="alert alert-danger">', '</div></span>'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Usuario</label>
                                <div class="controls">
                                    <input type="text" maxlength="45" class="span12" value="<?=set_value('usuario')?>" name="usuario" required>
                                    <?php form_error('usuario', '<span class="help-inline"><div class="alert alert-danger">', '</div></span>'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" maxlength="45" class="span12" name="password" required>
                                    <?php form_error('password', '<span class="help-inline"><div class="alert alert-danger">', '</div></span>'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Rol</label>
                                <div class="controls">
                                    <select name="rol" class="select2 span12">
                                        <?php foreach($roles as $rol) { ?>
                                        <option value="<?=$rol['idrol']?>"><?=$rol['rol']?></option>
                                        <?php } ?>
                                    </select>
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