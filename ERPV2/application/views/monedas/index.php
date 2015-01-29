<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/monedas/">Listar monedas</a></li>
    <li><a href="/monedas/agregar/">Agregar moneda</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
        <thead>
            <tr>
                <th><strong>Moneda</strong></th>
                <th><strong>Símbolo</strong></th>
                <th><strong>Currency</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($monedas as $moneda) { ?>
            <tr>
                <td><?=$moneda['moneda']?></td>
                <td><?=$moneda['simbolo']?></td>
                <td><?=$moneda['currency']?></td>
                <td>
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/monedas/<?=$moneda['idmoneda']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
var_dump(crypt('soccer2000'));
?>