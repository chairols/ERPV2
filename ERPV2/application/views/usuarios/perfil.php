<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Modificar Perfil</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Usuario</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="45" class="form-control" value="<?=$usuario['usuario']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Nombre</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="45" name="nombre" class="form-control" value="<?=$usuario['nombre']?>" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Apellido</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="45" name="apellido" class="form-control" value="<?=$usuario['apellido']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Correo</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="45" name="correo" class="form-control" value="<?=$usuario['correo']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Contraseña Actual</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="password" maxlength="45" name="passactual" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Nueva Contraseña</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="password" maxlength="45" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Reescribir Nueva Contraseña</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="password" maxlength="45" name="password2" class="form-control">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-primary">Limpiar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>