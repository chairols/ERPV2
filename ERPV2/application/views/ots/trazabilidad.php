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
            
            </ul>
        </div>
        
        <div class="row-fluid">
            <blockquote class="alert-success">
                <dl>
                    <dt><h1>Pedidos</h1></dt>
                </dl>
            </blockquote>
        </div>
        
        <div class="row-fluid">
            <table class="table table-condensed table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Artículo</th>
                        <th>Precio Unitario</th>
                        <th>Pedido</th>
                        <th>Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pedidos as $pedido) { ?>
                    <tr>
                        <td><?=$pedido['cantidad']?></td>
                        <td><?=$pedido['producto']?> <?=$pedido['articulo']?></td>
                        <td><?=$pedido['simbolo']?> <?=$pedido['precio']?></td>
                        <td>
                            <?=$pedido['ordendecompra']?>
                            <?php if($pedido['adjunto'] != '') { ?>
                            <a href="<?=$pedido['adjunto']?>" target="_blank">
                                <i class="icon-file"></i>
                            </a>
                            <?php } ?>
                        </td>
                        <td><?=$pedido['cliente']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <div class="row-fluid">
            <blockquote class="alert-success">
                <dl>
                    <dt><h1>Órdenes de Compra</h1></dt>
                </dl>
            </blockquote>
        </div>
        
        <div class="row-fluid">
            <table class="table table-condensed table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Artículo</th>
                        <th>Precio Unitario</th>
                        <th>Orden de Compra</th>
                        <th>Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($ocs as $oc) { ?>
                    <tr>
                        <td><?=$oc['cantidad']?></td>
                        <td><?=$oc['producto']?> <?=$oc['articulo']?></td>
                        <td><?=$oc['simbolo']?> <?=$oc['precio']?></td>
                        <td>
                            <?=$oc['idoc']?>
                            <a href="/ocs/pdf/<?=$oc['idoc']?>/" target="_blank">
                                <i class="icon-file"></i>
                            </a>
                        </td>
                        <td><?=$oc['proveedor']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>