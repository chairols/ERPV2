<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/provincias/">Listar provincias</a></li>
    <li class="active"><a href="/provincias/agregar/">Agregar provincia</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Provincia</label>
            <input type="text" maxlength="50" class="form-control" value="<?=set_value('provincia')?>" name="provincia" autofocus>
            <?=form_error('provincia', '<div class="alert alert-danger">', '</div>')?>
            <?=$alerta?>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>