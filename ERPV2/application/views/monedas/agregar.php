<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/monedas/">Listar monedas</a></li>
    <li class="active"><a href="/monedas/agregar/">Agregar moneda</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Moneda</label>
            <input type="text" maxlength="50" class="form-control" value="<?=set_value('moneda')?>" name="moneda" autofocus>
            <?=form_error('moneda', '<div class="alert alert-danger">', '</div>')?>
            <?=$alerta?>
        </div>
        
        <div class="form-group">
            <label>Símbolo</label>
            <input type="text" maxlength="10" class="form-control" value="<?=set_value('simbolo')?>" name="simbolo">
            <?=form_error('simbolo', '<div class="alert alert-danger">', '</div>')?>
        </div>

        <div class="form-group">
            <label>Currency</label>
            <input type="text" maxlength="3" class="form-control" value="<?=set_value('currency')?>" name="currency">
            <?=form_error('currency', '<div class="alert alert-danger">', '</div>')?>
        </div>
        
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>