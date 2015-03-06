<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/ots/">Listar O.T.S.</a></li>
                <li><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li><a href="/ots/ver/">Ver O.T.</a></li>
                <li><a href="#">O.T.S. Borradas</a></li>
                <li><a href="/ots/pendientes/">O.T.S. Pendientes</a></li>
                <li><a href="/ots/vencidas/">O.T.S. Vencidas</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Artículos</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-hover table-bordered table-condensed" id="sample_1">
                                <thead>
                                    <th><strong>Orden de Trabajo</strong></th>
                                    <th><strong>Fábrica</strong></th>
                                    <th><strong>Estado</strong></th>
                                    <th><strong>Acción</strong></th>
                                </thead>
                                <tbody>
                                    <?php foreach($ots as $ot) { ?>
                                    <tr>
                                        <td><?=$ot['numero_ot']?></td>
                                        <td><?=$ot['fabrica']?></td>
                                        <td>
                                            <?php if($ot['fecha_terminado'] == null) { ?>
                                            <div class="label label-important"><strong>PENDIENTE</strong></div>
                                            <?php } else { ?>
                                            <div class="label label-success"><strong>CUMPLIDA</strong></div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/ots/ver/<?=$ot['idot']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver // Falta desarrollar" class="label label-success tooltips"><i class="icon-eye-open"></i></a>
                                            <a href="/ots/pdf/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Generar Carátula" class="tooltips" target="_blank"><i class="icon-file"></i></a>
                                            <a href="/ots/modificar/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="label label-default tooltips"><i class="icon-edit"></i></a> 
                                            <a href="/ots/borrar/<?=$ot['idot']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="label label-important tooltips"><i class="icon-remove"></i></a>
                                            <a href="/log/ver/ots/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="label label-info tooltips"><i class="icon-time"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
