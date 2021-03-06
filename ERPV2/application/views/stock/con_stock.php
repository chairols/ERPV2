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
                <li><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
                <li class="active"><a href="/stock/con_stock/">Listar Con Stock</a></li>
                <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Artículos</h4>
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
                                        <th><strong>Producto</strong></th>
                                        <th><strong>Revisión</strong></th>
                                        <th><strong>Posición</strong></th>
                                        <th><strong>Cantidad</strong></th>
                                        <th><strong>Unidad de Medida</strong></th>
                                        <th><strong>Ubicación</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($articulos as $articulo) { ?>
                                    <tr>
                                        <td><?=$articulo['articulo']?></td>
                                        <td><?=$articulo['producto']?></td>
                                        <td><?=$articulo['revision']?></td>
                                        <td><?=$articulo['posicion']?></td>
                                        <td><?=$articulo['cantidad']?></td>
                                        <td><?=$articulo['medida_larga']?></td>
                                        <td><?=$articulo['ubicacion']?></td>
                                        <td>
                                            <a href="/stock/ver/<?=$articulo['idarticulo']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="label label-success tooltips"><i class="icon-eye-open"></i></a>
                                            <a href="/stock/modificar/<?=$articulo['idarticulo']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="label label-default tooltips"><i class="icon-edit"></i></a> 
                                            <a href="/stock/borrar/<?=$articulo['idarticulo']?>" class="label label-important"><i class="icon-remove"></i></a>
                                            <a href="/log/ver/articulos/<?=$articulo['idarticulo']?>/" class="label label-info"><i class="icon-time"></i></a>
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
    
</div>
