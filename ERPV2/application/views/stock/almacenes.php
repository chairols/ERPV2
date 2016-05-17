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
                <li class="active"><a href="/stock/agregar/">Agregar Stock</a></li>
                <li><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
                <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
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
                </dl>
            </blockquote>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Almacén al Stock</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Almacén</label>
                                <div class="controls">
                                    <select name="almacen" class="span12 select2">
                                        <?php foreach($almacenes as $almacen) { ?>
                                        <option value="<?=$almacen['idalmacen']?>"><?=$almacen['almacen']?></option>
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
            
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Almacenes Existentes</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-hover table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Almacén</th>
                                    <th>Cantidad</th>
                                    <th>Ubicación</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($stock_almacenes as $sa) { ?>
                                <tr>
                                    <td><?=$sa['almacen']?></td>
                                    <td><?=$sa['cantidad']?></td>
                                    <td><?=$sa['ubicacion']?></td>
                                    <td>
                                        <a href="/stock/editar/<?=$sa['idstock_almacen']?>/">
                                            <i class="icon-edit tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar"></i> 
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>