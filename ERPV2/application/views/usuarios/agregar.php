<div class="content-wrapper">
    <section class="content-header">
        <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/usuarios/">Listar Usuarios</a></li>
                <li class="active"><a href="/usuarios/agregar/">Agregar Usuario</a></li>
                <li><a href="/usuarios/modificar/">Modificar Usuario</a></li>
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
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Nombre</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="45" class="form-control" value="<?=set_value('nombre')?>" name="nombre" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Apellido</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="45" class="form-control" value="<?=set_value('apellido')?>" name="apellido" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Correo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="100" class="form-control" value="<?=set_value('correo')?>" name="correo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Usuario</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="45" class="form-control" value="<?=set_value('usuario')?>" name="usuario" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Password</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="password" maxlength="45" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Rol</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="rol" class="form-control select2">
                                        <?php foreach($roles as $rol) { ?>
                                        <option value="<?=$rol['idrol']?>"><?=$rol['rol']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Agregar</button>
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