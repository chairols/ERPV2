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
            <li><a href="/stock/agregar">Agregar Stock</a></li>
            <li class="active"><a href="/stock/modificar/">Modificar Stock</a></li>
            <li><a href="/stock/ver/">Ver Stock</a></li>
            <li><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
            <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
            <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Artículo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <dt>Artículo</dt>
                    <dd><?=$stock['producto']['producto']?> <?=$stock['articulo']['articulo']?></dd>
                    <dt>Marca</dt>
                    <dd><?=$stock['marca']['marca']?></dd>
                    <dt>Unidad de Medida</dt>
                    <dd><?=$stock['medida']['medida_larga']?></dd>
                    <dt>URL</dt>
                    <dd><a href="<?=$stock['url']?>" target="_blank"><?=$stock['url']?></a></dd>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Modificar Stock Almacén</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Cantidad</label>
                            <div class="col-md-9 col-sm-9 col-sx-12">
                                <input type="text" class="form-control" value="<?=$stock_almacen['cantidad']?>" name="cantidad" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Ubicación</label>
                            <div class="col-md-9 col-sm-9 col-sx-12">
                                <input type="text" class="form-control" value="<?=$stock_almacen['ubicacion']?>" name="ubicacion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Observaciones</label>
                            <div class="col-md-9 col-sm-9 col-sx-12">
                                <textarea class="form-control" rows="3" name="observaciones"><?=$stock_almacen['observaciones']?></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Modificar</button>
                                <button type="reset" class="btn btn-primary">Limpiar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>