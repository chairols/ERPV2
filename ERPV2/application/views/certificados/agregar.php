<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/certificados/">Listar Certificados</a></li>
                <li class="active"><a href="/certificados/agregar/">Agregar Certificado</a></li>
                <li><a href="/certificados/modificar/">Modificar Certificado</a></li>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Número de Certificado</label>
                                <div class="col-md-6 col-sm-6 col-xs-12" id="numero_certificado">
                                    <input type="text" id="numero" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Artículo</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="articulo" id="articulo" class="select2 form-control">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Número de Serie</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="numero_serie" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="cliente" id="cliente" class="select2 form-control">
                                        <?php foreach($clientes as $cliente) { ?>
                                        <option value="<?=$cliente['idcliente']?>"><?=$cliente['cliente']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" id="fecha" name="fecha" class="form-control pull-right datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Plantilla</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="plantilla" id="plantilla" class="select2 form-control">
                                        <?php foreach($plantillas as $plantilla) { ?>
                                        <option value="<?=$plantilla['idplantilla']?>"><?=$plantilla['titulo']?></option>
                                        <?php } ?>
                                    </select>
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

