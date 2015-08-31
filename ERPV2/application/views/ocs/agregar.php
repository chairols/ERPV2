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
                <li><a href="/ocs/">Listar O.C.S.</a></li>
                <li class="active"><a href="/ocs/agregar/">Agregar O.C.</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Orden de Compra</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
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
                            <div class="control-group">
                                <label class="control-label">Moneda</label>
                                <div class="controls">
                                    <select name="moneda" class="span12 select2">
                                        <?php foreach($monedas as $moneda) { ?>
                                        <option value="<?=$moneda['idmoneda']?>"><?=$moneda['moneda']?></option>
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