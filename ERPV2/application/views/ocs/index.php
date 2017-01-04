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
                <li class="active"><a href="/ocs/">Listar O.C.S.</a></li>
                <li><a href="/ocs/agregar/">Agregar O.C.</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Órdenes de Compra</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-hover table-bordered table-condensed" id="sample_1_desc">
                            <thead>
                                <tr>
                                    <th>O.C.</th>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    <th>Cantidad</th>
                                    <th>Artículo</th>
                                    <th>O.T.</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ocs as $oc) { ?>
                                <tr>
                                    <td><?=$oc['idoc']?></td>
                                    <td><?=date('d/m/Y' , strtotime($oc['timestamp']))?></td>
                                    <td><?=$oc['proveedor']?></td>
                                    <td><?=$oc['cantidad']?> <?=$oc['medida_corta']?></td>
                                    <td><?=$oc['producto']?> <?=$oc['articulo']?></td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <a href="/ocs/agregar_items/<?=$oc['idoc']?>/">
                                            <i class="alert-info icon-edit tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar"></i>
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