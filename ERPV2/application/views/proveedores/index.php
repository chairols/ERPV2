<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/proveedores/">Listar proveedores</a></li>
    <li><a href="/proveedores/agregar/">Agregar proveedor</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Proveedor</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($proveedores as $proveedor) { ?>
            <tr>
                <td><?=$proveedor['idproveedor']?></td>
                <td><?=$proveedor['proveedor']?></td>
                <td>
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/proveedores/<?=$proveedor['idproveedor']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>