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
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Modificar Perfil</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Usuario</label>
                                <div class="controls">
                                    <input type="text" maxlength="45" class="span12" value="<?=$usuario['usuario']?>" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <input type="text" maxlength="45" name="nombre" class="span12" value="<?=$usuario['nombre']?>" required autofocus>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellido</label>
                                <div class="controls">
                                    <input type="text" maxlength="45" name="apellido" class="span12" value="<?=$usuario['apellido']?>" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Correo</label>
                                <div class="controls">
                                    <input type="text" maxlength="45" name="correo" class="span12" value="<?=$usuario['correo']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contraseña Actual</label>
                                <div class="controls">
                                    <input type="password" name="passactual" maxlength="45" class="span12">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nueva Contraseña</label>
                                <div class="controls">
                                    <input type="password" name="password" maxlength="45" class="span12">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Reescribir Nueva Contraseña</label>
                                <div class="controls">
                                    <input type="password" name="password2" maxlength="45" class="span12">
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