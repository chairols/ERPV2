<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/productos/">Listar productos</a></li>
    <li class="active"><a href="/productos/agregar/">Agregar producto</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Producto</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('producto')?>" name="producto" autofocus>
            <?=form_error('producto', '<div class="alert alert-danger">', '</div>')?>
            <?=$alerta?>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>