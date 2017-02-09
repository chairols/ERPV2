<div class="box-body">
    <table id="datatable" class="table table-striped table-bordered table-condensed">

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