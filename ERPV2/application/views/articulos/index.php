<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$segmento?>
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
                            <table class="table table-striped table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th><strong>Producto</strong></th>
                                        <th><strong>Artículo</strong></th>
                                        <th><strong>Plano</strong></th>
                                        <th><strong>Revisión</strong></th>
                                        <th><strong>Posición</strong></th>
                                        <th><strong>Plano</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($articulos as $articulo) { ?>
                                    <tr>
                                        <td><?=$articulo['producto']?></td>
                                        <td><?=$articulo['articulo']?></td>
                                        <td><?=$articulo['plano']?></td>
                                        <td><?=$articulo['revision']?></td>
                                        <td><?=$articulo['posicion']?></td>
                                        <td><?=($articulo['planofile']!='')?"<a href='".$articulo['planofile']."' target='_blank'><i class='icon-file'></i></a>":""?></td>
                                        <td>
                                            <a href="/articulos/ver/<?=$articulo['idarticulo']?>/" class="label label-success"><i class="icon-eye-open"></i></a>
                                            <a href="/articulos/modificar/<?=$articulo['idarticulo']?>/" class="label label-default"><i class="icon-edit"></i></a> 
                                            <a href="/articulos/borrar/<?=$articulo['idarticulo']?>" class="label label-important"><i class="icon-remove"></i></a>
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
