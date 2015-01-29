<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/ots/">Listar O.T.S.</a></li>
    <li class="active"><a href="/ots/agregar/">Agregar O.T.</a></li>
    <li><a href="/ots/modificar/">Modificar O.T.</a></li>
    <li><a href="/ots/ver/">Ver O.T.</a></li>
    <li><a href="#">O.T.S. Borradas</a></li>
    <li><a href="/ots/pendientes/">O.T.S. Pendientes</a></li>
    <li><a href="/ots/vencidas/">O.T.S. Vencidas</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Fábrica</label>
            <select name="fabrica" id="fabrica" class="select2" onchange="cambiar();">
                <?php foreach($fabricas as $fabrica) { ?>
                <option value="<?=$fabrica['idfabrica']?>"><?=$fabrica['fabrica']?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Orden de Trabajo</label>
            <div id="resultado"></div>
            <?=form_error('ot', '<div class="alert alert-danger">', '</div>')?>
            <?=$alerta?>
        </div>
        
        <div class="form-group">
            <label>Artículo</label>
            <select class="select2" name="articulo">
                <?php foreach($articulos as $articulo) { ?>
                <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto'].' '.$articulo['articulo'].' '.$articulo['plano'].' Revisión '.$articulo['revision'].' Posición '.$articulo['posicion']?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Cantidad</label>
            <input type="text" maxlength="11" class="form-control" value="<?=set_value('cantidad')?>" name="cantidad">
            <?=form_error('cantidad', '<div class="alert alert-danger">', '</div>')?>
        </div>
        
        <div class="form-group">
            <label>Fecha de Necesidad</label>
            <input type="text" class="form-control" id="necesidad" name="fecha_necesidad" readonly>
        </div>
        
        <div class="form-group">
            <label>Fecha de Terminado</label>
            <input type="text" class="form-control" id="terminado" name="fecha_terminado" readonly>
        </div>
        
        <div class="form-group">
            <label>Observaciones</label>
            <textarea class="form-control" rows="5" name="observaciones"><?=set_value('observaciones')?></textarea>
        </div>
        
        <div class="form-group">
            <label>Número de Serie</label>
            <input type="text" class="form-control" name="numero_serie">
        </div>
        
        <div class="form-group">
            <label>Pedido</label>
            <select name="pedido" class="select2">
                <option value="null" selected>Ninguna</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<script type="text/javascript">
    function inicio() {
        cambiar();
    }
    
    function cambiar() {
        $.ajax({
            type: 'GET',
            url: '/ots/ajax_fabricas/'+$("#fabrica").val(),
            beforeSend: function() {
                $("#resultado").html('<img src="/assets/img/ajax-loader.gif">');
            },
            success: function(data) {
                $("#resultado").html(data);
            }
        });
    }
</script>