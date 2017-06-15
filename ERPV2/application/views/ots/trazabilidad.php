<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orden de Trabajo</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
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
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pedidos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
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
                                <?php $total = 0; ?>
                                <?php $moneda = null; ?>
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
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-file"></i>
                                            </button>
                                        </a>
                                        <?php } ?>
                                    </td>
                                    <td><?=$pedido['cliente']?></td>
                                    <?php $moneda = $pedido['simbolo']; ?>
                                    <?php $total+=($pedido['cantidad']*$pedido['precio']); ?>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>Total</td>
                                    <td class="alert-success bold"><?=$moneda?> <?=number_format($total, 2)?></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Órdenes de Compra</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php foreach ($ocs as $oc) { ?>
                        <?php if(count($oc) > 0) { // Compruebo que no se muestren tablas vacías por las distintas monedas ?>
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
                                <?php foreach($oc as $o) { ?>
                                <tr>
                                    <td><?=$o['cantidad']?></td>
                                    <td><?=$o['producto']?> <?=$o['articulo']?></td>
                                    <td><?=$o['simbolo']?> <?=number_format($o['precio'], 2)?></td>
                                    <td><?=$o['simbolo']?> <?=number_format($o['cantidad']*$o['precio'], 2)?></td>
                                    <td>
                                        <?=$o['idoc']?>
                                        <a href="/ocs/pdf/<?=$o['idoc']?>/" target="_blank">
                                            <i class="icon-file"></i>
                                        </a>
                                    </td>
                                    <td><?=$o['proveedor']?></td>
                                    <?php $total+= ($o['cantidad']*$o['precio']); ?>
                                    <?php $moneda = $o['simbolo']; ?>
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
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recepción de Materiales</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>IRM</th>
                                    <th>Cantidad</th>
                                    <th>Artículo</th>
                                    <th>Proveedor</th>
                                    <th>Recepcionado</th>
                                    <th>Fecha</th>
                                    <th>Controles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($irms as $irm) { ?>
                                <tr>
                                    <td><?=$irm['idirm']?></td>
                                    <td><?=$irm['cantidad']?> <?=$irm['medida_corta']?></td>
                                    <td><?=$irm['producto']?> <?=$irm['articulo']?></td>
                                    <td><?=$irm['proveedor']?></td>
                                    <td><?=$irm['nombre']?> <?=$irm['apellido']?></td>
                                    <td><?=strftime('%d/%m/%Y', strtotime($irm['timestamp']))?></td>
                                    <td>
                                        <?php foreach($irm['controles'] as $value) { ?>
                                        <span class="badge bg-green">
                                            <?=$value['control']?>
                                        </span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Certificados</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-condensed table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>Certificado</th>
                                    <th>Artículo</th>
                                    <th>Número de Serie</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($certificados as $certificado) { ?>
                                <tr>
                                    <td>
                                        <a href="/certificados/imprimir/<?=$certificado['idcertificado']?>/" target="_blank">
                                            <?=$certificado['numero_certificado']?>
                                        </a>
                                    </td>
                                    <td><?=$certificado['producto']?> <?=$certificado['articulo']?></td>
                                    <td><?=$certificado['numero_serie']?></td>
                                    <td><?=$certificado['cliente']?></td>
                                    <td><?=$certificado['fecha']?></td>
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