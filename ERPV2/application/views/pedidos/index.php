<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/pedidos/">Listar pedidos</a></li>
                <li><a href="/pedidos/agregar/">Agregar pedido</a></li>
            </ul>
        </div>
            
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-bordered table-hover" id="datatable">
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
                                    <td><a href="<?=$pedido['adjunto']?>" target="_blank" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Adjunto" class="tooltips">
                                        <?=($pedido['adjunto']!='')?"<button class='btn btn-info btn-xs'><i class='fa fa-file'></i></button>":""?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/pedidos/agregar_items/<?=$pedido['idpedido']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                            <button class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a> 
                                        <a href="#" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="tooltips">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                        <a href="/log/ver/pedidos/<?=$pedido['idpedido']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial">
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
    </section>
</div>


<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Pedidos</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-condensed table-bordered table-hover" id="sample_1_desc">
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
