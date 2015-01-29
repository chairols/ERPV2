<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/productos/">Listar productos</a></li>
    <li><a href="/productos/agregar/">Agregar producto</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
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
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/productos/<?=$producto['idproducto']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>