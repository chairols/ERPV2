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
                <li class="active"><a href="/contratos/">Listar Contratos</a></li>
                <li><a href="/contratos/agregar/">Agregar Contrato</a></li>
                <li><a href="/contratos/modificar/">Modificar Contrato</a></li>
                <li><a href="/contratos/ver/">Ver Contrato</a></li>
                <li><a href="/contratos/vigentes/">Contratos Vigentes</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Contratos</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-condensed table-hover table-bordered" id="sample_1_desc">
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
                                    <td><?=(time()>=strtotime($contrato['vigencia_desde']) && time()<=strtotime($contrato['vigencia_hasta']))?"<div class='label label-success'><strong>VIGENTE</strong></div>":"<div class='label label-important'><strong>VENCIDO</strong></div>"?></td>
                                    <td>
                                        <a href="<?=$contrato['adjunto']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Adjunto" class="tooltips" target="_blank">
                                            <i class="icon-file"></i>
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
</div>
