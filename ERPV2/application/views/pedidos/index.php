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
                <li class="active"><a href="/pedidos/">Listar pedidos</a></li>
                <li><a href="/pedidos/agregar/">Agregar pedido</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Fábricas</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-condensed table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr>
                                        <th><strong>Pedido #</strong></th>
                                        <th><strong>Cliente</strong></th>
                                        <th><strong>Orden de Compra</strong></th>
                                        <th><strong>Adjunto</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pedidos as $pedido) { ?>
                                    <tr>
                                        <td><?=$pedido['idpedido']?></td>
                                        <td><?=$pedido['cliente']?></td>
                                        <td><?=$pedido['ordendecompra']?></td>
                                        <td><a href="<?=$pedido['adjunto']?>" target="_blank"><?=($pedido['adjunto']!='')?"<i class='icon-file'></i>":""?></a></td>
                                        <td>
                                            <a href="/pedidos/agregar_items/<?=$pedido['idpedido']?>" class="label label-default"><i class="icon-edit"></i></a> 
                                            <a href="#" class="label label-important"><i class="icon-remove"></i></a>
                                            <a href="/log/ver/pedidos/<?=$pedido['idpedido']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="label label-info"><i class="icon-time"></i></a>
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
