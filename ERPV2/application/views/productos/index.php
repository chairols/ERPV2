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
                <li class="active"><a href="/productos/">Listar Productos</a></li>
                <li><a href="/productos/agregar/">Agregar Producto</a></li>
                <li><a href="/productos/modificar/">Modificar Producto</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Productos</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-condensed table-hover table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th><strong>Producto</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($productos as $producto) { ?>
                                    <tr>
                                        <td><?=$producto['producto']?></td>
                                        <td>
                                            <a href="#">
                                                <i class="alert-success icon-eye-open tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Ver"></i>
                                            </a>
                                            <a href="/productos/modificar/<?=$producto['idproducto']?>"> 
                                                <i class="alert-info icon-edit tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Editar"></i>
                                            </a> 
                                            <a href="#" class="label label-important"><i class="icon-remove"></i></a>
                                            <a href="/log/ver/productos/<?=$producto['idproducto']?>/">
                                                <i class="alert-info icon-time tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Log"></i></a>
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