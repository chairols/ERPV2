<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/plantillas/">Listar Plantillas</a></li>
                <li><a href="/plantillas/agregar/">Agregar Plantilla</a></li>
                <li><a href="/plantillas/modificar/">Modificar Plantilla</a></li>
                <li><a href="/plantillas/ver/">Ver Plantilla</a></li>
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
                            <table class="table table-condensed table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th><strong>Título</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($plantillas as $plantilla) { ?>
                                    <tr>
                                        <td><?=$plantilla['titulo']?></td>
                                        <td>
                                            <a href="/plantillas/modificar/<?=$plantilla['idplantilla']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="/plantillas/imprimir/<?=$plantilla['idplantilla']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Imprimir" target="_blank">
                                                <button class="btn btn-primary btn-xs">
                                                    <i class="fa fa-print"></i>
                                                </button>
                                            </a>
                                            <a href="/log/ver/plantillas/<?=$plantilla['idplantilla']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log">
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
