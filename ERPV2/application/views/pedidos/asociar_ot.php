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
                <li><a href="/pedidos/">Listar pedidos</a></li>
                <li class="active"><a href="/pedidos/agregar/">Agregar pedido</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <blockquote>
                <dl>
                    <dt>Cantidad</dt>
                    <dd><?=$item['cantidad']?></dd>
                    <dt>Item</dt>
                    <dd><?=$item['producto']?> <?=$item['articulo']?></dd>
                </dl>
            </blockquote>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Posibles OTS</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-condensed table-hover table-responsive" id="sample_1_desc">
                            <thead>
                                <tr>
                                    <th>O.T.</th>
                                    <th>Fábrica</th>
                                    <th>Cantidad</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ots as $ot) { ?>
                                <tr>
                                    <td><?=$ot['numero_ot']?></td>
                                    <td><?=$ot['fabrica']?></td>
                                    <td><?=$ot['cantidad']?></td>
                                    <td><?php if($item['idot'] == $ot['idot']) {?>
                                        <i class="alert-success icon-check tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Asociada a esta Orden de Trabajo"></i>
                                        <a href="#">
                                            <i class="alert-error icon-remove tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar Asociación a esta Orden de Trabajo"></i>
                                        </a>
                                        <?php } else {?>
                                        <a href="#">
                                            <i class="alert-success icon-plus tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Asociar a esta Orden de Trabajo"></i>
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php var_dump($ots); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>