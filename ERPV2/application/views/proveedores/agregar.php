<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/proveedores/">Listar proveedores</a></li>
    <li class="active"><a href="/proveedores/agregar/">Agregar proveedor</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Proveedor</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('proveedor')?>" name="proveedor" autofocus>
            <?=form_error('proveedor', '<div class="alert alert-danger">', '</div>')?>
            <?=$alerta?>
        </div>

        <div class="form-group">
            <label>Domicilio</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('domicilio')?>" name="domicilio">
            <?=form_error('domicilio', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('telefono')?>" name="telefono">
            <?=form_error('telefono', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Localidad</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('localidad')?>" name="localidad">
            <?=form_error('localidad', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Provincia</label>
            <select name="provincia" class="select2">
                <?php foreach($provincias as $provincia) { ?>
                <option value="<?=$provincia['idprovincia']?>"><?=$provincia['provincia']?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Contacto</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('contacto')?>" name="contacto">
            <?=form_error('contacto', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Correo</label>
            <input type="email" maxlength="100" class="form-control" value="<?=set_value('correo')?>" name="correo">
            <?=form_error('correo', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Observaciones</label>
            <textarea class="form-control" name="observaciones"><?=set_value('observaciones')?></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>