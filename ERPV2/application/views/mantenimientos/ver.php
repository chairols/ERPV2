<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/mantenimientos/">Listar Mantenimientos</a></li>
                <li><a href="/mantenimientos/agregar/">Agregar Mantenimiento</a></li>
                <li><a href="/mantenimientos/modificar/">Modificar Mantenimiento</a></li>
                <li class="active"><a href="/mantenimientos/ver/">Ver Mantenimiento</a></li>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" value="<?=$mantenimiento['fecha']?>" class="form-control pull-right" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Mantenimiento</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?=($mantenimiento['tipo_mantenimiento']=='C')?"Correctivo":"Preventivo"?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Máquina</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="Máquina N° <?=$mantenimiento['idmaquina']?> <?=$mantenimiento['maquina']['tipo_maquina']['tipo_maquina']?> <?=$mantenimiento['maquina']['marca']['marca']?> <?=$mantenimiento['maquina']['modelo']?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnóstico</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="diagnostico" class="form-control" rows="6" disabled><?=$mantenimiento['diagnostico']?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Corrección</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="correccion" class="form-control" rows="6" disabled><?=$mantenimiento['correccion']?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Responsable</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?=$mantenimiento['usuario']['nombre']?> <?=$mantenimiento['usuario']['apellido']?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiempo de Reparación (Horas)</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?=$mantenimiento['tiempo_reparacion']?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>