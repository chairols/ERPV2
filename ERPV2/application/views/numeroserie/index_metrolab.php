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
                <li class="active"><a href="/numeroserie/">Listar Números de Serie</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Números de Serie</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-condensed table-hover table-bordered" id="sample_1_desc">
                            <thead>
                                <tr>
                                    <th><strong>Número de Serie</strong></th>
                                    <th><strong>Fábrica</strong></th>
                                    <th><strong>Orden de Trabajo</strong></th>
                                    <th><strong>Artículo</strong></th>
                                    <th><strong>Acción</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($numeroserie as $ns) { ?>
                                <tr>
                                    <td><?=$ns['numero_serie']?></td>
                                    <td><?=$ns['fabrica']?></td>
                                    <td><a href="/ots/ver/<?=$ns['idot']?>/"><?=$ns['numero_ot']?></a></td>
                                    <td><?=$ns['producto']?> <?=$ns['articulo']?></td>
                                    <td>
                                        <a href="/numeroserie/trazabilidad/<?=$ns['numero_serie']?>/"><i class="icon-exchange alert-success tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Trazabilidad"></i></a>
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