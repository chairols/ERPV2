<div class="content-wrapper">
    <section class="content-header">
        <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/usuarios/">Listar Usuarios</a></li>
                <li><a href="/usuarios/agregar/">Agregar Usuario</a></li>
                <li class="active"><a href="/usuarios/modificar/">Modificar Usuario</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                        <h1>En desarrollo</h1>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Nombre</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="45" class="form-control" value="<?=$usuario['nombre']?>" name="nombre" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Apellido</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="45" class="form-control" value="<?=$usuario['apellido']?>" name="apellido" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Correo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="100" class="form-control" value="<?=$usuario['correo']?>" name="correo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Usuario</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="45" class="form-control" value="<?=$usuario['usuario']?>" name="usuario" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Password</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="password" maxlength="45" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Rol</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="rol" class="form-control select2">
                                        <?php foreach($roles as $rol) { ?>
                                        <option value="<?=$rol['idrol']?>"<?=($rol['idrol']==$usuario['tipo_usuario'])?" selected":""?>><?=$rol['rol']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Modificar</button>
                                    <button type="reset" class="btn btn-primary">Limpiar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="main-content">
    <div class="container-fluid">
        
        
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