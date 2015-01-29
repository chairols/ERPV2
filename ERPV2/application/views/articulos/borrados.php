<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/articulos/">Listar artículos</a></li>
    <li><a href="/articulos/agregar/">Agregar artículos</a></li>
    <li><a href="/articulos/modificar/">Modificar artículo</a></li>
    <li><a href="/articulos/ver/">Ver artículo</a></li>
    <li class="active"><a href="/articulos/borrados/">Artículos borrados</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Artículo</strong></th>
                <th><strong>Revisión</strong></th>
                <th><strong>Posición</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($articulos as $articulo) { ?>
            <tr>
                <td><?=$articulo['idarticulo']?></td>
                <td><?=$articulo['articulo']?></td>
                <td><?=$articulo['revision']?></td>
                <td><?=$articulo['posicion']?></td>
                <td>
                    <a href="/articulos/ver/<?=$articulo['idarticulo']?>" class="label label-success"><i class="fa fa-eye"></i></a>
                    <a href="/log/ver/articulos/<?=$articulo['idarticulo']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
