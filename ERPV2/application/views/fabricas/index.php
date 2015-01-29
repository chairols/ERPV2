<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/fabricas/">Listar fábricas</a></li>
    <li><a href="/fabricas/agregar/">Agregar fábrica</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Sucursal</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($fabricas as $fabrica) { ?>
            <tr>
                <td><?=$fabrica['idfabrica']?></td>
                <td><?=$fabrica['fabrica']?></td>
                <td>
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>