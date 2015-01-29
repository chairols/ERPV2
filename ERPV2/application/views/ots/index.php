<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/ots/">Listar O.T.S.</a></li>
    <li><a href="/ots/agregar/">Agregar O.T.</a></li>
    <li><a href="/ots/modificar/">Modificar O.T.</a></li>
    <li><a href="/ots/ver/">Ver O.T.</a></li>
    <li><a href="#">O.T.S. Borradas</a></li>
    <li><a href="/ots/pendientes/">O.T.S. Pendientes</a></li>
    <li><a href="/ots/vencidas/">O.T.S. Vencidas</a></li>
</ul>

<div class="block-flat">

    <table id="datatable" class="display table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>Orden de Trabajo</strong></th>
                <th><strong>Fábrica</strong></th>
                <th><strong>Estado</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
 
        
        
        <tbody>
        <?php foreach($ots as $ot) { ?>
            <tr>
                <td><?=$ot['numero_ot']?></td>
                <td><?=$ot['fabrica']?></td>
                <td>
                    <?php if($ot['fecha_terminado'] == null) { ?>
                    <div class="label label-danger"><strong>PENDIENTE</strong></div>
                    <?php } else { ?>
                    <div class="label label-success"><strong>CUMPLIDA</strong></div>
                    <?php } ?>
                </td>
                <td>
                    <a href="/ots/ver/<?=$ot['idot']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver // Falta desarrollar" class="label label-success"><i class="fa fa-eye"></i></a>
                    <a href="/ots/pdf/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Generar Carátula" target="_blank"><i class="fa fa-file-o"></i></a>
                    <a href="/ots/modificar/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="/ots/borrar/<?=$ot['idot']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/ots/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        
        
    </table>

</div>

