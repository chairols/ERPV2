<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li class="active"><a href="/articulos/">Listar Artículos</a></li>
            <li><a href="/articulos/agregar/">Agregar Artículos</a></li>
            <li><a href="/articulos/modificar/">Modificar Artículo</a></li>
            <li><a href="/articulos/ver/">Ver Artículo</a></li>
            <li><a href="/articulos/borrados/">Artículos Borrados</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listar Artículos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered table-condensed">
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
                                    <a href="/articulos/ver/<?=$articulo->getId()?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">
                                        <button class="btn btn-xs btn-success">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="/articulos/modificar/<?=$articulo->getId()?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a> 
                                    <a href="/articulos/borrar/<?=$articulo->getId()?>" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="tooltips">
                                        <button class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </a>
                                    <a href="/log/ver/articulos/<?=$articulo->getId()?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log" class="tooltips">
                                        <button class="btn btn-xs btn-info">
                                            <i class="fa fa-clock-o"></i>
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