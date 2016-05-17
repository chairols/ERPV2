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
                <li><a href="/stock/">Listar Stock</a></li>
                <li><a href="/stock/agregar/">Agregar Stock</a></li>
                <li class="active"><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
                <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <blockquote>
                    <dl>
                        <dt>Artículo</dt>
                        <dd><?=$stock['producto']['producto']?> <?=$stock['articulo']['articulo']?></dd>
                        <dt>Marca</dt>
                        <dd><?=$stock['marca']['marca']?></dd>
                        <dt>Unidad de Medida</dt>
                        <dd><?=$stock['medida']['medida_larga']?></dd>
                        <dt>URL</dt>
                        <dd><a href="<?=$stock['url']?>" target="_blank"><?=$stock['url']?></a></dd>
                        <dt>Almacén</dt>
                        <dd><?=$stock_almacen['almacen']['almacen']?></dd>
                    </dl>
                </blockquote>
            </div>
            
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Modificar Stock de Almacén</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form class="form-horizontal" method="POST">
                            <div class="control-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls">
                                    <input type="text" class="span12" value="<?=$stock_almacen['cantidad']?>" name="cantidad" autofocus required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Ubicación</label>
                                <div class="controls">
                                    <input type="text" class="span12" value="<?=$stock_almacen['ubicacion']?>" name="ubicacion">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea class="span12" name="observaciones"><?=$stock_almacen['observaciones']?></textarea>
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