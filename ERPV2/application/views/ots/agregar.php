<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/ots/">Listar O.T.S.</a></li>
                <li class="active"><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li><a href="/ots/ver/">Ver O.T.</a></li>
                <li><a href="/ots/borradas/">O.T.S. Borradas</a></li>
                <li><a href="/ots/pendientes/">O.T.S. Pendientes</a></li>
                <li><a href="/ots/vencidas/">O.T.S. Vencidas</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span8">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Órdenes de Trabajo</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Fábrica</label>
                                <div class="controls">
                                    <select name="fabrica" id="fabrica" class="input-xlarge select2" onchange="cambiar();">
                                        <?php foreach($fabricas as $fabrica) { ?>
                                        <option value="<?=$fabrica['idfabrica']?>"><?=$fabrica['fabrica']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Órden de Trabajo</label>
                                <div class="controls">
                                    <div id="resultado"></div>
                                    <?=form_error('ot', '<div class="alert alert-danger">', '</div>')?>
                                    <?=$alerta?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls">
                                    <select class="input-xxlarge select2" name="articulo">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto'].' '.$articulo['articulo'].' '.$articulo['plano'].' Revisión '.$articulo['revision'].' Posición '.$articulo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls">
                                    <input type="text" maxlength="11" class="input-xlarge" value="<?=set_value('cantidad')?>" name="cantidad">
                                    <?=form_error('cantidad', '<div class="alert alert-danger">', '</div>')?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha de Necesidad</label>
                                <div class="controls">
                                    <input type="text" class="form-control input-xlarge" id="dp1" name="fecha_necesidad" readonly>
                                    <a onclick="limpiar_campo('dp1');" href="#" class="label label-important"><i class="icon-time"></i> Borrar fecha</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha de Terminado</label>
                                <div class="controls">
                                    <input type="text" class="form-control input-xlarge" id="dp2" name="fecha_terminado" readonly>
                                    <a onclick="limpiar_campo('dp2')" href="#" class="label label-important"><i class="icon-time"></i> Borrar fecha</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea class="form-control input-xlarge" rows="5" name="observaciones"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Número de Serie</label>
                                <div class="controls">
                                    <input type="text" id="tags_1" class="tags input-xlarge" name="numero_serie">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-save"></i> Guardar
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="icon-remove"></i> Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block-flat">
    <form role="form" method="post">
        
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