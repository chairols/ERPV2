<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/insumos/">Listar insumos</a></li>
    <li><a href="/insumos/agregar/">Agregar insumo</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Insumo</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($insumos as $insumo) { ?>
            <tr>
                <td><?=$insumo['idinsumo']?></td>
                <td><?=$insumo['insumo']?></td>
                <td>
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/insumos/<?=$insumo['idinsumo']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>