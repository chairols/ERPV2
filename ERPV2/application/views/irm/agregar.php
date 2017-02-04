<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/irm/">Listar I.R.M.</a></li>
                <li class="active"><a href="/irm/agregar/">Agregar I.R.M.</a></li>
                <li><a href="/irm/pendientes/">Pendientes</a></li>
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
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Siguiente</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="main-content">
    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Proveedor</label>
                                <div class="controls">
                                    <select name="proveedor" class="span12 select2">
                                        <?php foreach($proveedores as $proveedor) { ?>
                                        <option value="<?=$proveedor['idproveedor']?>"><?=$proveedor['proveedor']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-save"></i> Guardar
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="icon-remove"></i> Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>