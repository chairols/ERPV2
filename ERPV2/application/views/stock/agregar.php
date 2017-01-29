<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li><a href="/stock/">Listar Stock</a></li>
            <li class="active"><a href="/stock/agregar">Agregar Stock</a></li>
            <li><a href="/stock/modificar/">Modificar Stock</a></li>
            <li><a href="/stock/ver/">Ver Stock</a></li>
            <li><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
            <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
            <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agregar Stock</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Artículo</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <select name="articulo" class="form-control sel2">
                                    <?php foreach($articulos as $articulo) { ?>
                                    <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?> Pos <?=$articulo['posicion']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Marca</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <select name="marca" class="form-control sel2">
                                    <?php foreach($marcas as $marca) { ?>
                                    <option value="<?=$marca['idmarca']?>"><?=$marca['marca']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Unidad de Medida</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <select name="medida" class="form-control sel2">
                                    <?php foreach($medidas as $medida) { ?>
                                    <option value="<?=$medida['idmedida']?>"><?=$medida['medida_larga']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">URL</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="500" class="form-control" name="url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Observaciones</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <textarea class="form-control" name="observaciones" rows="6"></textarea>
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
</div>

<script type="text/javascript">
    function inicio() {
        $(".sel2").select2();
    }
</script>