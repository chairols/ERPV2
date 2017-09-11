<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/ots/">Listar O.T.S.</a></li>
                <li><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li><a href="/ots/ver/">Ver O.T.</a></li>
                <li class="active"><a href="/ots/borradas/">O.T.S. Borradas</a></li>
                <li><a href="/ots/sin_pedidos/">O.T.S. Sin Pedidos</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div id="gears">
                        <div class="text-center">
                            <img src="/assets/AdminLTE-2.3.11/gears.gif">
                            <br><br>
                        </div>
                    </div>
                    <div id="tabla" style="display: none;">
                        <div class="box-body">
                            <table class="table table-hover table-bordered table-condensed" id="datatable-desc">
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
                                        <td><?=$ot['producto']?> <?=$ot['articulo']?></td>
                                        <td><?=$ot['fecha_necesidad']?></td>
                                        <td><?=$ot['fecha_terminado']?></td>
                                        <td>
                                            <?php if($ot['fecha_terminado'] == null) { ?>
                                            <div class="label label-important"><strong>PENDIENTE</strong></div>
                                            <?php } else { ?>
                                            <div class="label label-success"><strong>CUMPLIDA</strong></div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/ots/ver/<?=$ot['idot']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver">
                                                <button class="btn btn-success btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="/ots/pdf/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Generar Carátula" class="tooltips" target="_blank">
                                                <button class="btn btn-info btn-xs">
                                                    <i class="fa fa-file"></i>
                                                </button>
                                            </a>
                                            <a href="/ots/modificar/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a> 
                                            <a href="/ots/borrar/<?=$ot['idot']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar">
                                                <button class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                            <a href="/log/ver/ots/<?=$ot['idot']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log">
                                                <button class="btn btn-info btn-xs">
                                                    <i class="fa fa-clock-o"></i>
                                                </button>
                                            </a>
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
    </section>
</div>




<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/ots/">Listar O.T.S.</a></li>
                <li><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li><a href="/ots/ver/">Ver O.T.</a></li>
                <li class="active"><a href="/ots/borradas/">O.T.S. Borradas</a></li>
                <li><a href="/ots/pendientes/">O.T.S. Pendientes</a></li>
                <li><a href="/ots/vencidas/">O.T.S. Vencidas</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Órdenes de Trabajo</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-hover table-bordered table-condensed" id="sample_1">
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
                                        <td><?=$ot['producto']?> <?=$ot['articulo']?></td>
                                        <td><?=$ot['fecha_necesidad']?></td>
                                        <td><?=$ot['fecha_terminado']?></td>
                                        <td>
                                            <?php if($ot['fecha_terminado'] == null) { ?>
                                            <div class="label label-important"><strong>PENDIENTE</strong></div>
                                            <?php } else { ?>
                                            <div class="label label-success"><strong>CUMPLIDA</strong></div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/ots/ver/<?=$ot['idot']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="label label-success tooltips"><i class="icon-eye-open"></i></a>
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

<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
    }
</script>