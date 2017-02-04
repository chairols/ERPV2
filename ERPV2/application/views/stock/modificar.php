<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/stock/">Listar Stock</a></li>
                <li><a href="/stock/agregar">Agregar Stock</a></li>
                <li class="active"><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
                <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
                <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Artículo</h3>
                    </div>
                    <div class="box-body">
                        <dl class="dl-horizontal">
                            <dt>Artículo</dt>
                            <dd><?=$stock['producto']['producto']?> <?=$stock['articulo']['articulo']?></dd>
                            <dt>Marca</dt>
                            <dd><?=$stock['marca']['marca']?></dd>
                            <dt>Unidad de Medida</dt>
                            <dd><?=$stock['medida']['medida_larga']?></dd>
                            <dt>URL</dt>
                            <dd><a href="<?=$stock['url']?>" target="_blank"><?=$stock['url']?></a></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Modificar Stock Almacén</h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
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
    </section>
</div>