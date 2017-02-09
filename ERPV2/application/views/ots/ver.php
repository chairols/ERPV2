<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/ots/">Listar O.T.S.</a></li>
                <li><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li class="active"><a href="/ots/ver/">Ver O.T.</a></li>
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
                        <div class="form-horizontal">
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
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Producto</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" class="form-control" value="<?=$producto['producto']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Artículo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" class="form-control" value="<?=$articulo['articulo']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Cantidad</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="11" class="form-control" value="<?=$ot['cantidad']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Fecha de Necesidad</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" class="form-control" id="dp1" value="<?=($ot['fecha_necesidad'])?date('d/m/Y', strtotime($ot['fecha_necesidad'])):""?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Fecha de Terminado</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" class="form-control" id="dp2" value="<?=($ot['fecha_terminado'])?date('d/m/Y', strtotime($ot['fecha_terminado'])):""?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Observaciones</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <textarea class="form-control" rows="5" name="observaciones" readonly><?=$ot['observaciones']?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
