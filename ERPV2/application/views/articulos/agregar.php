<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/articulos/">Listar artículos</a></li>
    <li class="active"><a href="/articulos/agregar/">Agregar artículos</a></li>
    <li><a href="/articulos/modificar/">Modificar artículo</a></li>
    <li><a href="/articulos/ver/">Ver artículo</a></li>
    <li><a href="/articulos/borrados/">Artículos borrados</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Artículo</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('articulo')?>" name="articulo" autofocus>
            <?=form_error('articulo', '<div class="alert alert-danger">', '</div>')?>
            <?=$alerta?>
        </div>

        <div class="form-group">
            <label>Plano</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('plano')?>" name="plano">
            <?=form_error('plano', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Archivo del plano</label>
            <input type="file" class="form-control" name="planofile">
        </div>

        <div class="form-group">
            <label>Producto</label>
            <select name="producto" class="select2">
                <?php foreach($productos as $producto) { ?>
                <option value="<?=$producto['idproducto']?>"><?=$producto['producto']?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Revisión</label>
            <input type="number" maxlength="11" class="form-control" value="<?=set_value('revision')?>" name="revision">
            <?=form_error('revision', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Posición</label>
            <input type="number" maxlength="11" class="form-control" value="<?=set_value('posicion')?>" name="posicion">
            <?=form_error('posicion', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Observaciones</label>
            <textarea class="form-control" name="observaciones"><?=set_value('observaciones')?></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
