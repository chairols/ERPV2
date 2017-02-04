<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
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
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Fábrica</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="fabrica" id="fabrica" class="form-control select2" onchange="cambiar();">
                                        <?php foreach($fabricas as $fabrica) { ?>
                                        <option value="<?=$fabrica['idfabrica']?>"><?=$fabrica['fabrica']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Orden de Trabajo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <div id="resultado"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Artículo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select class="form-control select2" name="articulo">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto'].' '.$articulo['articulo'].' '.$articulo['plano'].' Revisión '.$articulo['revision'].' Posición '.$articulo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Cantidad</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="11" class="form-control" value="<?=set_value('cantidad')?>" name="cantidad">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Fecha de Necesidad</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" id="dp1" name="fecha_necesidad" class="form-control pull-right datepicker">
                                        <div class="input-group-addon">
                                            <a onclick="limpiar_campo('dp1');" href="#" class="label label-danger">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Fecha de Terminado</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" id="dp2" name="fecha_terminado" class="form-control pull-right datepicker">
                                        <div class="input-group-addon">
                                            <a onclick="limpiar_campo('dp2');" href="#" class="label label-danger">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Observaciones</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <textarea class="form-control" rows="5" name="observaciones"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                    <button type="reset" class="btn btn-primary">Limpiar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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