<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/ots/">Listar O.T.S.</a></li>
                <li><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li class="active"><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li><a href="/ots/ver/">Ver O.T.</a></li>
                <li><a href="/ots/borradas/">O.T.S. Borradas</a></li>
                <li><a href="/ots/sin_pedidos/">O.T.S. Sin Pedidos</a></li>
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
                                    <input type="text" class="form-control" value="<?=$fabrica['fabrica']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Orden de Trabajo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" class="form-control" value="<?=$ot['numero_ot']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Artículo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select class="form-control select2" name="articulo">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option <?=($articulo['idarticulo']==$ot['idarticulo'])?"selected":""?> value="<?=$articulo['idarticulo']?>"><?=$articulo['producto'].' '.$articulo['articulo'].' '.$articulo['plano'].' Revisión '.$articulo['revision'].' Posición '.$articulo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Cantidad</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="number" maxlength="11" class="form-control" value="<?=$ot['cantidad']?>" name="cantidad">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Fecha de Necesidad</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" id="dp1" name="fecha_necesidad" value="<?=($ot['fecha_necesidad']!=NULL)?$ot['fecha_necesidad']:""?>" class="form-control pull-right datepicker">
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
                                        <input type="text" id="dp2" name="fecha_terminado" value="<?=($ot['fecha_terminado']!=NULL)?$ot['fecha_terminado']:""?>" class="form-control pull-right datepicker">
                                        <div class="input-group-addon">
                                            <a onclick="limpiar_campo('dp2');" href="#" class="label label-danger">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Números de Serie</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="numero_serie[]" class="tags form-control" multiple tabindex="-1" aria-hidden="true">
                                        <?php foreach($numeros_serie as $ns) { ?>
                                        <option value="<?=$ns['numero_serie']?>" selected><?=$ns['numero_serie']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Observaciones</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <textarea class="form-control" rows="5" name="observaciones"><?=$ot['observaciones']?></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Modificar</button>
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