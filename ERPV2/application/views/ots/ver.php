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
                <li><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li class="active"><a href="/ots/ver/">Ver O.T.</a></li>
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
                                    <input type="text" class="input-xlarge" value="<?=$fabrica['fabrica']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Órden de Trabajo</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?=$ot['numero_ot']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?=$articulo['articulo']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls">
                                    <input type="text" maxlength="11" class="input-xlarge" value="<?=$ot['cantidad']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha de Necesidad</label>
                                <div class="controls">
                                    <input type="text" class="form-control input-xlarge" id="dp1" value="<?=($ot['fecha_necesidad'])?$ot['fecha_necesidad']:""?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha de Terminado</label>
                                <div class="controls">
                                    <input type="text" class="form-control input-xlarge" id="dp2" value="<?=($ot['fecha_terminado'])?$ot['fecha_terminado']:""?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea class="form-control input-xlarge" rows="5" name="observaciones" readonly><?=$ot['observaciones']?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>