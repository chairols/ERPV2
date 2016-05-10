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
                    <dt><h1>Orden de Trabajo</h1></dt>
                </dl>
            </blockquote>
        </div>
        <div class="row-fluid">
            <table class="table table-condensed table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Orden de Trabajo</th>
                        <th>Cantidad</th>
                        <th>Artículo</th>
                        <th>Fecha O.T.</th>
                        <th>Fecha Necesidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$fabrica['fabrica']?> <?=$ot['numero_ot']?></td>
                        <td><?=$ot['cantidad']?></td>
                        <td><?=$producto['producto']?> <?=$articulo['articulo']?></td>
                        <td><?=strftime('%d/%m/%Y', strtotime($ot['timestamp']))?></td>
                        <td><?=strftime('%d/%m/%Y', strtotime($ot['fecha_necesidad']))?></td>
                    </tr>
                </tbody>
            </table>
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
                        <th>Precio Total</th>
                        <th>Pedido</th>
                        <th>Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pedidos as $pedido) { ?>
                    <tr>
                        <td><?=$pedido['cantidad']?></td>
                        <td><?=$pedido['producto']?> <?=$pedido['articulo']?></td>
                        <td><?=$pedido['simbolo']?> <?=number_format($pedido['precio'], 2)?></td>
                        <td><?=$pedido['simbolo']?> <?=number_format($pedido['cantidad']*$pedido['precio'], 2)?></td>
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
            <table class="table table-condensed table-responsive table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Artículo</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
                        <th>Orden de Compra</th>
                        <th>Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php $moneda = null; ?>
                    <?php foreach($ocs as $oc) { ?>
                    <tr>
                        <td><?=$oc['cantidad']?></td>
                        <td><?=$oc['producto']?> <?=$oc['articulo']?></td>
                        <td><?=$oc['simbolo']?> <?=number_format($oc['precio'], 2)?></td>
                        <td><?=$oc['simbolo']?> <?=number_format($oc['cantidad']*$oc['precio'], 2)?></td>
                        <td>
                            <?=$oc['idoc']?>
                            <a href="/ocs/pdf/<?=$oc['idoc']?>/" target="_blank">
                                <i class="icon-file"></i>
                            </a>
                        </td>
                        <td><?=$oc['proveedor']?></td>
                        <?php $total+= ($oc['cantidad']*$oc['precio']); ?>
                        <?php $moneda = $oc['simbolo']; ?>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Total</td>
                        <td class="alert-success bold"><?=$moneda.' '.number_format($total, 2)?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</div>