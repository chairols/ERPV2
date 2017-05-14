<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/certificados/">Listar Certificados</a></li>
                <li><a href="/certificados/agregar/">Agregar Certificado</a></li>
                <li class="active"><a href="/certificados/modificar/">Modificar Certificado</a></li>
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
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="11" class="form-control" id="num_certificado" value="<?=$certificado['numero_certificado']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Artículo</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="articulo" class="select2 form-control">
                                    <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"<?=($articulo['idarticulo']==$certificado['idarticulo'])?" selected":""?>><?=$articulo['producto']?> <?=$articulo['articulo']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Número de Serie</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="11" class="form-control" id="numero_serie" value="<?=$certificado['numero_serie']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="cliente" class="select2 form-control">
                                    <?php foreach($clientes as $cliente) { ?>
                                        <option value="<?=$cliente['idcliente']?>"<?=($cliente['idcliente']==$certificado['idcliente'])?" selected":""?>><?=$cliente['cliente']?></option>
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
                                        <input type="text" id="fecha" name="fecha" value="<?=$certificado['fecha']?>" class="form-control pull-right datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="certificado" name="certificado"><?=$certificado['certificado']?></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" id="modificar">Modificar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>