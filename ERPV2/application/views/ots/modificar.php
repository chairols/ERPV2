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
            <p><?=$fabrica['fabrica']?></p>
        </div>
        
        <div class="form-group">
            <label>Orden de Trabajo</label>
            <p><?=$ot['numero_ot']?></p>
        </div>
        
        <div class="form-group">
            <label>Artículo</label>
            <select class="select2" name="articulo">
                <?php foreach($articulos as $articulo) { ?>
                <option <?=($articulo['idarticulo']==$ot['idarticulo'])?"selected":""?> value="<?=$articulo['idarticulo']?>"><?=$articulo['producto'].' '.$articulo['articulo'].' '.$articulo['plano'].' Revisión '.$articulo['revision'].' Posición '.$articulo['posicion']?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Cantidad</label>
            <input type="text" maxlength="11" class="form-control" value="<?=$ot['cantidad']?>" name="cantidad">
            <?=form_error('cantidad', '<div class="alert alert-danger">', '</div>')?>
        </div>
        
        <div class="form-group">
            <label>Fecha de Necesidad</label>
            <input type="text" class="form-control" id="necesidad" name="fecha_necesidad" value="<?=($ot['fecha_necesidad']!=NULL)?$ot['fecha_necesidad']:""?>" readonly>
            <a onclick="limpiar_campo('necesidad');" href="#" class="label label-danger"><i class="fa fa-times"></i> Borrar fecha</a>
        </div>
        
        <div class="form-group">
            <label>Fecha de Terminado</label>
            <input type="text" class="form-control" id="terminado" name="fecha_terminado" value="<?=($ot['fecha_terminado']!=NULL)?$ot['fecha_terminado']:""?>" readonly>
            <a onclick="limpiar_campo('terminado')" href="#" class="label label-danger"><i class="fa fa-times"></i> Borrar fecha</a>
        </div>
        
        <div class="form-group">
            <label>Observaciones</label>
            <textarea class="form-control" rows="5" name="observaciones"><?=$ot['observaciones']?></textarea>
        </div>
        
        <div class="form-group">
            <label>Número de Serie</label>
            <input type="text" class="form-control" name="numero_serie" value="<?=($ot['numero_serie']!=NULL)?$ot['numero_serie']:""?>">
        </div>
        
        <div class="form-group">
            <label>Pedido</label>
            <select name="pedido" class="select2">
                <option value="null" selected>Ninguna</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
</div>

<script type="text/javascript">
    function inicio() {
        cambiar();
    }
    
    function limpiar_campo(campo) {
        $("#"+campo).val("");
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