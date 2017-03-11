<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/mantenimientos/">Listar Mantenimientos</a></li>
                <li><a href="/mantenimientos/agregar/">Agregar Mantenimiento</a></li>
                <li><a href="/mantenimientos/modificar/">Modificar Mantenimiento</a></li>
                <li><a href="/mantenimientos/ver/">Ver Mantenimiento</a></li>
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
                            <table class="table table-condensed table-hover table-bordered" id="datatable-desc">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Máquina</th>
                                        <th>Horas</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($mantenimientos as $mantenimiento) { ?>
                                    <tr>
                                        <td><?=$mantenimiento['fecha']?></td>
                                        <td><?=($mantenimiento['tipo_mantenimiento']=='P')?"Preventivo":"Correctivo"?></td>
                                        <td><?=$mantenimiento['tipo_maquina']?> <?=$mantenimiento['marca']?> <?=$mantenimiento['modelo']?></td>
                                        <td><?=$mantenimiento['tiempo_reparacion']?></td>
                                        <td></td>
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