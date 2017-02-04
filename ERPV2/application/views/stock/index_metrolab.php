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
                <li class="active"><a href="/stock/">Listar Stock</a></li>
                <li><a href="/stock/agregar">Agregar Stock</a></li>
                <li><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
                <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
                <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
            </ul>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Stock</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-bordered table-condensed table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th><strong>Artículo</strong></th>
                                    <th><strong>Marca</strong></th>
                                    <th><strong>Cantidad</strong></th>
                                    <th><strong>Unidad de Medida</strong></th>
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
                                    <td>
                                        <a href="/stock/almacenes/<?=$s['idstock']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                            <button class="btn btn-warning">
                                                <i class="icon-edit"></i>
                                            </button>
                                        </a>
                                        <a href="/log/ver/stock/<?=$s['idstock']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log" class="tooltips">
                                            <button class="btn btn-info">
                                                <i class="icon-time"></i>
                                            </button>
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