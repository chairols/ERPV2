<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/insumos/">Listar insumos</a></li>
    <li class="active"><a href="/insumos/agregar/">Agregar insumo</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Insumo</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('insumo')?>" name="insumo" autofocus>
            <?=form_error('insumo', '<div class="alert alert-danger">', '</div>')?>
            <?=$alerta?>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>