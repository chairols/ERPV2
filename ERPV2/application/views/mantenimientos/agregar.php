<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/mantenimientos/">Listar Mantenimientos</a></li>
                <li class="active"><a href="/mantenimientos/agregar/">Agregar Mantenimiento</a></li>
                <li><a href="/mantenimientos/modificar/">Modificar Mantenimiento</a></li>
                <li><a href="/mantenimientos/ver/">Ver Mantenimiento</a></li>
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
                                        <input type="text" id="fecha" class="form-control pull-right datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Mantenimiento</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="tipo_mantenimiento" class="form-control select2">
                                        <option value="C">Correctivo</option>
                                        <option value="P">Preventivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Máquina</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="maquina" class="form-control select2">
                                        <?php foreach($maquinas as $maquina) { ?>
                                        <option value="<?=$maquina['idmaquina']?>">Maquina N° <?=$maquina['idmaquina']?> <?=$maquina['tipo_maquina']?> <?=$maquina['marca']?> <?=$maquina['modelo']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnóstico</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="diagnostico" class="form-control" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Corrección</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="correccion" class="form-control" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Responsable</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="usuario" class="form-control select2">
                                        <?php foreach($usuarios as $usuario) { ?>
                                        <option value="<?=$usuario['idusuario']?>"><?=$usuario['nombre']?> <?=$usuario['apellido']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiempo de Reparación (Horas)</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="tiempo_reparacion" class="form-control">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button id="agregar" class="btn btn-success">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>