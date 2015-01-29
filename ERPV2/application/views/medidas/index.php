<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/medidas/">Listar medidas</a></li>
    <li><a href="/medidas/agregar/">Agregar medida</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
        <thead>
            <tr>
                <th><strong>Descripción corta</strong></th>
                <th><strong>Descripción larga</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($medidas as $medida) { ?>
            <tr>
                <td><?=$medida['medida_corta']?></td>
                <td><?=$medida['medida_larga']?></td>
                <td>
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/medidas/<?=$medida['idmedida']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>