  <div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row-border">
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
                        <h3 class="box-title">Listar Pedidos</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable-desc" class="table table-bordered table-hover">
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
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->