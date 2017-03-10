<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/maquinas/">Listar Máquinas</a></li>
                <li class="active"><a href="/maquinas/agregar/">Agregar Máquina</a></li>
                <li><a href="/maquinas/modificar/">Modificar Máquina</a></li>
                <li><a href="/maquinas/ver/">Ver Máquina</a></li>
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
                            <div class="form-group" id="form_numero_maquina">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Número de Máquina</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="11" class="form-control" id="numero_maquina" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Máquina</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="tipo_maquina" class="form-control select2">
                                        <?php foreach($tiposmaquinas as $tipomaquina) { ?>
                                        <option value="<?=$tipomaquina['idtipo_maquina']?>"><?=$tipomaquina['tipo_maquina']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="marca" class="form-control select2">
                                        <?php foreach($marcas as $marca) { ?>
                                        <option value="<?=$marca['idmarca']?>"><?=$marca['marca']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Modelo</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="100" class="form-control" id="modelo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="estado" class="form-control select2">
                                        <option value="F">Funciona</option>
                                        <option value="NF">No Funciona</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ubicación</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="ubicacion" class="form-control select2">
                                        <?php foreach($fabricas as $fabrica) { ?>
                                        <option value="<?=$fabrica['idfabrica']?>"><?=$fabrica['fabrica']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="form_frecuencia_preventivo">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Frecuencia Preventivo (días)</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="11" id="frecuencia_preventivo" class="form-control" name="frecuencia" required>
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