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
                <li><a href="/stock/agregar">Agregar Stock</a></li>
                <li><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li class="active"><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
                <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
                <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
            </ul>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Stock Por Almacén</h4>
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
                                    <select name="almacen" class="span10 select2">
                                        <?php foreach($almacenes as $almacen) { ?>
                                        <option value="<?=$almacen['idalmacen']?>"<?=($almacen['idalmacen']==$almacen_seleccionado)?" selected":""?>><?=$almacen['almacen']?></option>
                                        <?php } ?>
                                    </select>
                                    <button type="submit" class="span2 btn btn-success">
                                        <i class="icon-save"></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered table-condensed table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th><strong>Artículo</strong></th>
                                    <th><strong>Marca</strong></th>
                                    <th><strong>Cantidad</strong></th>
                                    <th><strong>Unidad de Medida</strong></th>
                                    <th><strong>Almacén</strong></th>
                                    <th><strong>Ubicación</strong></th>
                                    <th><strong>Acción</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($stock as $s) { ?>
                                <tr>
                                    <td><?=$s['producto']?> <?=$s['articulo']?></td>
                                    <td><?=$s['marca']?></td>
                                    <td><?=$s['cantidad']?></td>
                                    <td><?=$s['medida_larga']?></td>
                                    <td><?=$s['almacen']?></td>
                                    <td><?=$s['ubicacion']?></td>
                                    <td>
                                        <a href="/stock/almacenes/<?=$s['idstock']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                            <i class="icon-edit"></i>
                                        </a>
                                        <a href="/log/ver/stock/<?=$s['idstock']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Log" class="tooltips">
                                            <i class="icon-time"></i>
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
