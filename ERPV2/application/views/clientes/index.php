<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/clientes/">Listar clientes</a></li>
    <li><a href="/clientes/agregar/">Agregar cliente</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Cliente</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clientes as $cliente) { ?>
            <tr>
                <td><?=$cliente['idcliente']?></td>
                <td><?=$cliente['cliente']?></td>
                <td>
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/clientes/<?=$cliente['idcliente']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>