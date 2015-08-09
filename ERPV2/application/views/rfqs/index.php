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
                <li class="active"><a href="/rfqs/">Listar RFQ's</a></li>
                <li><a href="/rfqs/agregar/">Agregar RFQ</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> RFQ's</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-hover table-bordered table-condensed" id="sample_1">
                            <thead>
                                <tr>
                                    <td><strong>O.T.</strong></td>
                                    <td><strong>Cantidad</strong></td>
                                    <td><strong>Artículo</strong></td>
                                    <td><strong>Material</strong></td>
                                    <td><strong>Destino</strong></td>
                                    <td><strong>Acción</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($rfqs as $rfq) { ?>
                                <tr>
                                    <td><?=($rfq['numero_ot']==null)?"Sin OT":$rfq['numero_ot']?></td>
                                    <td><?=$rfq['cantidad']?></td>
                                    <td><?=$rfq['producto']?> <?=$rfq['articulo']?></td>
                                    <td><?=$rfq['material']?></td>
                                    <td><?=$rfq['fabrica']?></td>
                                    <td>&nbsp;</td>
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