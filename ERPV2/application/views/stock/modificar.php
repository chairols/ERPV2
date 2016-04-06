<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-tabs-justified">
            <li><a href="/stock/">Listar Stock</a></li>
            <li class="active"><a href="/stock/modificar/">Modificar Stock</a></li>
            <li><a href="/stock/ver/">Ver Stock</a></li>
            <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
            <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
        </ul>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Artículo</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls">
                                    <input type="text" class="span12" value="<?=$articulo['articulo']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Producto</label>
                                <div class="controls">
                                    <input type="text" class="span12" value="<?=$producto['producto']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Posición</label>
                                <div class="controls">
                                    <input type="text" class="span12" value="<?=$articulo['posicion']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea class="span12" readonly><?=$stock['observaciones']?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar al Stock</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="post" class="form-horizontal">
                            <input type="hidden" name="idstock" value="<?=$stock['idstock']?>">
                            <div class="control-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls">
                                    <input type="text" name="cantidad" class="span12" autofocus required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Ubicación</label>
                                <div class="controls">
                                    <input type="text" name="ubicacion" class="span12" required>
                                </div>
                            </div>
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
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea class="span12" name="observaciones"></textarea>
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
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Modificar Stock Existente</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-bordered table-condensed table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th><strong>Cantidad</strong></th>
                                    <th><strong>Almacén</strong></th>
                                    <th><strong>Ubicación</strong></th>
                                    <th><strong>Observaciones</strong></th>
                                    <th><strong>Acción</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($stock_existente as $s) { ?>
                                <tr>
                                    <td><?=$s['cantidad']?></td>
                                    <td><?=$s['almacen']?></td>
                                    <td><?=$s['ubicacion']?></td>
                                    <td><?=$s['observaciones']?></td>
                                    <td>&nbsp;</td>
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
