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
                <li class="active"><a href="/articulos/">Listar Artículos</a></li>
                <li><a href="/articulos/agregar/">Agregar Artículos</a></li>
                <li><a href="/articulos/modificar/">Modificar Artículo</a></li>
                <li><a href="/articulos/ver/">Ver Artículo</a></li>
                <li><a href="/articulos/borrados/">Artículos Borrados</a></li>
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
                                        <th><strong>Plano</strong></th>
                                        <th><strong>Revisión</strong></th>
                                        <th><strong>Posición</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($articulos as $articulo) { ?>
                                    <tr>
                                        <td><?=$articulo->getArticulo()?></td>
                                        <td><?=$articulo->getProducto()->getProducto()?></td>
                                        <td><?=($articulo->getPlano()->getUrlDelPlano()!='')?"<a href='".$articulo->getPlano()->getUrlDelPlano()."' target='_blank'>".$articulo->getPlano()->getPlano()."</a>":""?></td>
                                        <td><?=$articulo->getPlano()->getRevision()?></td>
                                        <td><?=$articulo->getPosicion()?></td>
                                        <td>
                                            <a href="/articulos/ver/<?=$articulo->getId()?>/"><i class="alert-success icon-eye-open tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Ver"></i></a>
                                            <a href="/articulos/modificar/<?=$articulo->getId()?>/" class="label label-default"><i class="icon-edit"></i></a> 
                                            <a href="/articulos/borrar/<?=$articulo->getId()?>" class="label label-important"><i class="icon-remove"></i></a>
                                            <a href="/log/ver/articulos/<?=$articulo->getId()?>/" class="label label-info"><i class="icon-time"></i></a>
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
