<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/ocs/">Listar O.C.S.</a></li>
                <li class="active"><a href="/ocs/agregar/">Agregar O.C.</a></li>
                <li><a href="/ocs/agregar_items/">Modificar O.C.</a></li>
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
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Proveedor</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="proveedor" class="form-control select2">
                                        <?php foreach($proveedores as $proveedor) { ?>
                                        <option value="<?=$proveedor['idproveedor']?>"><?=$proveedor['proveedor']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Moneda</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="moneda" class="form-control select2">
                                        <?php foreach($monedas as $moneda) { ?>
                                        <option value="<?=$moneda['idmoneda']?>"><?=$moneda['moneda']?></option>
                                        <?php } ?>
                                    </select>
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