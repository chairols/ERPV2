<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/contratos/">Listar Contratos</a></li>
                <li><a href="/contratos/agregar/">Agregar Contrato</a></li>
                <li><a href="/contratos/modificar/">Modificar Contrato</a></li>
                <li><a href="/contratos/ver/">Ver Contrato</a></li>
                <li><a href="/contratos/vigentes/">Contratos Vigentes</a></li>
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
                                        <td><strong># Contrato</strong></td>
                                        <td><strong>Cliente</strong></td>
                                        <td><strong>Descripción</strong></td>
                                        <td><strong>Desde</strong></td>
                                        <td><strong>Hasta</strong></td>
                                        <td><strong>Estado</strong></td>
                                        <td><strong>Acción</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($contratos as $contrato) { ?>
                                    <tr>
                                        <td><?=$contrato['numero_contrato']?></td>
                                        <td><?=$contrato['cliente']?></td>
                                        <td><?=$contrato['descripcion']?></td>
                                        <td><?=$contrato['vigencia_desde']?></td>
                                        <td><?=$contrato['vigencia_hasta']?></td>
                                        <td><?=(time()>=strtotime($contrato['vigencia_desde']) && time()<=strtotime($contrato['vigencia_hasta']))?"<div class='badge bg-green'><strong>VIGENTE</strong></div>":"<div class='badge bg-red'><strong>VENCIDO</strong></div>"?></td>
                                        <td>
                                            <a href="<?=$contrato['adjunto']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Adjunto" class="tooltips" target="_blank">
                                                <button class="btn btn-info btn-xs">
                                                    <i class="fa fa-file"></i>
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

<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
    }
</script>