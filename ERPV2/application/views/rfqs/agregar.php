<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/rfqs/">Listar RFQ's</a></li>
    <li class="active"><a href="/rfqs/agregar/">Agregar RFQ</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Item</label>
            <input type="text" maxlength="11" class="form-control" value="<?=set_value('item')?>" name="item" autofocus>
            <?=form_error('item', '<div class="alert alert-danger">', '</div>')?>
        </div>
        
        <div class="form-group">
            <label>Fecha</label>
            <input type="text" class="form-control" id="fecha" name="fecha" readonly>
            <?=form_error('fecha', '<div class="alert alert-danger">', '</div>')?>
        </div>
        
        <div class="form-group">
            <label>Orden de Trabajo</label>
            <select class="select2" name="ot">
                <option value="null">NO</option>
                <?php foreach($ots as $ot) { ?>
                <option value="<?=$ot['idot']?>"><?=$ot['numero_ot']?></option>
                <?php } ?>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<script type="text/javascript">
    function inicio() {
        $("#fecha").datepicker({
            format: 'yyyy-mm-dd'
        });
    }

</script>