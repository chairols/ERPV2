<div class="box-body">
    <table id="datatable-desc" class="table table-striped table-bordered table-condensed">
        <thead>
            <th><strong>O.T.</strong></th>
            <th><strong>Fábrica</strong></th>
            <th><strong>Cantidad</strong></th>
            <th><strong>Material</strong></th>
            <th><strong>Necesidad</strong></th>
            <th><strong>Terminado</strong></th>
            <th><strong>Estado</strong></th>
            <th><strong>Acción</strong></th>
        </thead>
        <tbody>
            <?php foreach($ots as $ot) { ?>
            <tr>
                <td><?=$ot['numero_ot']?></td>
                <td><?=$ot['fabrica']?></td>
                <td><?=$ot['cantidad']?></td>
                <td><a href="/articulos/ver/<?=$ot['idarticulo']?>"><?=$ot['producto']?> <?=$ot['articulo']?></a></td>
                <td><?=$ot['fecha_necesidad']?></td>
                <td><?=$ot['fecha_terminado']?></td>
                <td>
                    <?php if($ot['fecha_terminado'] == null) { ?>
                    <div class="badge bg-red"><strong>PENDIENTE</strong></div>
                    <?php } else { ?>
                    <div class="badge bg-green"><strong>CUMPLIDA</strong></div>
                    <?php } ?>
                </td>
                <td>
                    <a href="/ots/ver/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">
                        <button class="btn btn-success btn-xs">
                        <i class="fa fa-eye"></i>
                        </button>
                    </a>
                    <a href="/ots/pdf/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Generar Carátula" class="tooltips" target="_blank">
                        <button class="btn btn-xs">
                            <i class="fa fa-file"></i>
                        </button>
                    </a>
                    <a href="/ots/modificar/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                        <button class="btn btn-warning btn-xs">
                        <i class="fa fa-edit"></i>
                        </button>
                    </a>
                    <a href="/ots/borrar/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="tooltips">
                        <button class="btn btn-danger btn-xs">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </a>
                    <a href="/log/ver/ots/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="tooltips">
                        <button class="btn btn-info btn-xs">
                            <i class="fa fa-clock-o"></i>
                        </button>
                    </a>
                    <a href="/ots/trazabilidad/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Trazabilidad" class="tooltips">
                        <button class="btn btn-success btn-xs">
                        <i class="fa fa-exchange"></i>
                        </button>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>