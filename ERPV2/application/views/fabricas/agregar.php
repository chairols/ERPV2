<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/fabricas/">Listar fábricas</a></li>
    <li class="active"><a href="/fabricas/agregar/">Agregar fábrica</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('fabrica')?>" name="fabrica" autofocus>
            <?=form_error('fabrica', '<div class="alert alert-danger">', '</div>')?>
            <?=$alerta?>
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('direccion')?>" name="direccion">
            <?=form_error('direccion', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Localidad</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('localidad')?>" name="localidad">
            <?=form_error('localidad', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('telefono')?>" name="telefono">
            <?=form_error('telefono', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>